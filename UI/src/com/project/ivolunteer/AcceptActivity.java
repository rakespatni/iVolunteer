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

import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.os.Build;

public class AcceptActivity extends ActionBarActivity {

	public JSONArray results = null;
	public ArrayList<String> arrlist = new ArrayList<String>();
	public final static String GET_EID= "&eid=";
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_accept);

		//Permit execution on the main thread 
				StrictMode.ThreadPolicy policy = new StrictMode.
				ThreadPolicy.Builder().permitAll().build();
				StrictMode.setThreadPolicy(policy);
						
				//Receive the intent
				Intent intent = getIntent();
				//intent key values
				final String iRequest = intent.getStringExtra(MainActivity.KEY_URL).replaceAll("\\s","");	/*Remove all white spaces as precaution*/
				final String iUSER = intent.getStringExtra(MainActivity.KEY_USER);
				final String iPASS = intent.getStringExtra(MainActivity.KEY_PASS);
				//Establish connection to URL
				try {
					  URL url = new URL(iRequest);
					  HttpURLConnection con = (HttpURLConnection) url.openConnection();
					  readStream(con.getInputStream());
					}	catch (Exception e) {
						  e.printStackTrace();
						}
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
				
				//Parse the JSON string and update 'arrlist' with the list of artists,tracks and bitmaps
				parseJson(finalstring);
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
	private void parseJson(String Jstr)
	{
		if(Jstr != null){
			try{
				
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
								
		        Log.w("IV","JSON parse Complete!");
		        
		        Log.w("IV",arrlist.get(0));

		        Log.w("IV",arrlist.get(1));
			
			}catch(JSONException e){
				e.printStackTrace();
			}
		}
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.accept, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
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
			View rootView = inflater.inflate(R.layout.fragment_accept,
					container, false);
			return rootView;
		}
	}

}
