package com.project.ivolunteer;


import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.project.ivolunteer.MainActivity.PlaceholderFragment;

import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.os.Build;
import android.os.StrictMode;

public class HomeActivity extends ActionBarActivity {
	
	public JSONArray results = null;
	public ArrayList<String> arrlist = new ArrayList<String>();
	public final static String GET_EID= "&eid=";
	public static final String URL_IVA = "http://athena.nitc.ac.in/~nachi_bcs10/iVolunteer/backend/accept.php?json=1";
	public static final String URL_IVC = "http://athena.nitc.ac.in/~nachi_bcs10/iVolunteer/backend/commit.php?json=1";
	public String MEMORY;
	public String commitEid;
	public String iUSER;
	public String iPASS;
	public String eid;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_home);
		

		//Permit execution on the main thread 
		StrictMode.ThreadPolicy policy = new StrictMode.
		ThreadPolicy.Builder().permitAll().build();
		StrictMode.setThreadPolicy(policy);
				
		//Receive the intent
		Intent intent = getIntent();
		//intent key values
		final String iRequest = intent.getStringExtra(MainActivity.KEY_URL).replaceAll("\\s","");	/*Remove all white spaces as precaution*/
		iUSER = intent.getStringExtra(MainActivity.KEY_USER);
		iPASS = intent.getStringExtra(MainActivity.KEY_PASS);
		//Establish connection to URL
		try {
			  URL url = new URL(iRequest);
			  HttpURLConnection con = (HttpURLConnection) url.openConnection();
			  readStream(con.getInputStream());
			}	catch (Exception e) {
				  e.printStackTrace();
				}	
		parseJson(MEMORY,"eventlist");
		ArrayAdapter<String> newArrayAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, arrlist);
		
		ListView listview = (ListView)findViewById(R.id.listView1);
		listview.setAdapter(newArrayAdapter);
		
		/*-----Action to perform when user clicks on a specific entity of the list------*/
		listview.setOnItemClickListener(new AdapterView.OnItemClickListener() {
	          public void onItemClick(AdapterView<?> parent, View view,
	              int position, long id) {
	               
	              // get event name of selected list item
	              eid = arrlist.get(position);
	              setContentView(R.layout.eventdisplay);
	              String url = URL_IVA + iUSER + iPASS + GET_EID + eid;
	              Log.w("IV", url);
	              try {
	    			  URL url2 = new URL(url);
	    			  HttpURLConnection con = (HttpURLConnection) url2.openConnection();
	    			  readStream(con.getInputStream());
	    			}	catch (Exception e) {
	    				  e.printStackTrace();
	    				}
	              parseJson(MEMORY,"eventdesc");
	              /*
	              // Launching itself (same activity) as the new intent to search for artist
	              Intent i = new Intent(getApplicationContext(), AcceptActivity.class);
	              i.putExtra(MainActivity.KEY_URL, url);
	              i.putExtra(MainActivity.KEY_USER, iUSER);
	              i.putExtra(MainActivity.KEY_PASS, iPASS);
	              startActivity(i);
	             */
	          }
	        });
	}

	/* Read the text stream (JSON Object) obtained through URL call */
	private void readStream(InputStream in) {
		BufferedReader reader = null;
		try {
				reader = new BufferedReader(new InputStreamReader(in));
				
				//String builder to grow the sting(s) read
				StringBuilder stringBuilder = new StringBuilder();
				stringBuilder.append("");
				
				//String to hold buffer state
				String line="";
				
				//Read line by line
				while ((line = reader.readLine()) != null) {
					stringBuilder.append(line);
				}
				
				//Final entire string
				String finalstring = stringBuilder.toString();
				
				MEMORY = finalstring;
		} 
		catch (IOException e) {
			e.printStackTrace();
		}	finally {
			 			if (reader != null) {
			 			try {
			 					reader.close();
			 			}	catch (IOException e) {
			 					e.printStackTrace();
			 				}
			 			}
			}
		
	}
	/* Decode the JSON object and obtain specific tag values*/
	private void parseJson(String Jstr, String type)
	{
		if(Jstr != null){
			try{
				if(type == "eventlist"){	
					//Obtain the JSON array under the results tag.
					JSONObject Jobj = new JSONObject(Jstr);
					results = Jobj.getJSONArray("Event"); 
				
					for(int i=0; i<results.length(); i++){
					
						//i'th object element of the JSON array
						JSONObject Jtemp = results.getJSONObject(i);
					
						//Obtain Value of specific tags
						String event_id = Jtemp.getString("Eid");
					
						//Add the values to 'arrlist'
						arrlist.add(event_id);
										
					}
				}
				else if(type=="eventdesc"){
					
					JSONObject Jobj = new JSONObject(Jstr);
					JSONObject Jtemp = Jobj.getJSONObject("Events");
					arrlist.clear();
					TextView textView = (TextView) findViewById(R.id.textView1);
					textView.setText("Place: "+ Jtemp.getString("place"));
					
					textView = (TextView) findViewById(R.id.textView2);
					textView.setText("Date: "+ Jtemp.getString("date"));
					
					textView = (TextView) findViewById(R.id.textView3);
					textView.setText("Time: "+ Jtemp.getString("time"));
					
					textView = (TextView) findViewById(R.id.textView4);
					textView.setText("Duration: "+ Jtemp.getString("duration"));
					
					textView = (TextView) findViewById(R.id.textView5);
					textView.setText("Deadline: "+ Jtemp.getString("deadline"));
					
					textView = (TextView) findViewById(R.id.textView6);
					textView.setText("Phone: "+ Jtemp.getString("ph_no"));
					
					textView = (TextView) findViewById(R.id.textView7);
					textView.setText("Description: "+ Jtemp.getString("event_des"));
					
					textView = (TextView) findViewById(R.id.textView8);
					textView.setText("volunteer type: "+ Jtemp.getString("type_vol"));
					
					textView = (TextView) findViewById(R.id.textView9);
					textView.setText("Limit: "+ Jtemp.getString("limit"));
					
					}
					else if(type=="eventcommit"){
						
						JSONObject Jobj = new JSONObject(Jstr);
						String pos = Jobj.getString("pos");
						
						TextView textView = (TextView) findViewById(R.id.text1);
						textView.setText("Position: "+ pos);
						
					}
				}catch(JSONException e){
				e.printStackTrace();
			}
				
		}
	}

	public void reload(View view){
		// Launching itself (same activity) as the new intent to search for artist
        Intent intent = new Intent(getApplicationContext(), HomeActivity.class);
        intent.putExtra(MainActivity.KEY_URL, MainActivity.URL_IV + iUSER + iPASS);
		intent.putExtra(MainActivity.KEY_USER, iUSER);
		intent.putExtra(MainActivity.KEY_PASS, iPASS);
        startActivity(intent);
	}
	public void commit(View view){
	
		String cRequest = URL_IVC + iUSER + iPASS + GET_EID + eid;
		try {
			  URL url = new URL(cRequest);
			  HttpURLConnection con = (HttpURLConnection) url.openConnection();
			  readStream(con.getInputStream());
			}	catch (Exception e) {
				  e.printStackTrace();
				}	
		setContentView(R.layout.commitdisplay);
		parseJson(MEMORY,"eventcommit");
		
	}
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		 MenuInflater inflater = getMenuInflater();
		 inflater.inflate(R.menu.main, menu);
		 return super.onCreateOptionsMenu(menu);
		 
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.

		switch (item.getItemId()) {
        case R.id.action_committed:
        	/*Display the input layout only if user hits search action button*/
        	/* Call - show - display*/
            return true;
        default:
            return super.onOptionsItemSelected(item);
		}

	}

	/**
	 * A placeholder fragment containing a simple view.
	 */
	public static class PlaceholderFragment extends Fragment {

		public PlaceholderFragment() {
		}

		@Override
		public View onCreateView(LayoutInflater inflater, ViewGroup container,
				Bundle savedInstanceState) {
			View rootView = inflater.inflate(R.layout.fragment_home, container,
					false);
			return rootView;
		}
	}

}
