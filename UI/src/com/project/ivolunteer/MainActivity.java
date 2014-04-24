package com.project.ivolunteer;




import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.os.Build;

public class MainActivity extends ActionBarActivity {
	
	public final static String KEY_URL = "com.project.iv.URL";
	public final static String KEY_USER = "com.project.iv.USER";
	public final static String KEY_PASS = "com.project.iv.PASS";
	public final static String GET_USER = "&vusr=";
	public final static String GET_PASS = "&vpass=";
	public static final String URL_IV = "http://athena.nitc.ac.in/~nachi_bcs10/iVolunteer/backend/vol_login_jump.php?json=1";

	public void login(View view) {
		
		//Create intent to fetch and process information from API
		Intent intent = new Intent(this, HomeActivity.class );
		
		//To store the users input values
		String user, pass;
		
		//Input for 'Term'
		EditText editText = (EditText) findViewById(R.id.edit_user);
		user = editText.getText().toString();
		
		//construct URL with GET request for 'User'
		StringBuilder stringBuild = new StringBuilder();
		stringBuild.append(GET_USER).append(user);
		
		//Input for 'Limit'
		editText = (EditText) findViewById(R.id.edit_pass);
		pass = editText.getText().toString();

		//Append URL with GET request for 'Limit'
		stringBuild.append(GET_PASS).append(pass);
		String iValue = URL_IV + stringBuild.toString();
		Log.w("IV",iValue);
		
		
		//Send the constructed URL and 'Limit' to the intent
		intent.putExtra(KEY_URL, iValue);
		intent.putExtra(KEY_USER, GET_USER + user);
		intent.putExtra(KEY_PASS, GET_PASS + pass);
		
		//Start the intent
		startActivity(intent);

	}
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.fragment_main);
		/*
		if (savedInstanceState == null) {
			getSupportFragmentManager().beginTransaction()
					.add(R.id.container, new PlaceholderFragment()).commit();
		}*/
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {

		// Inflate the menu; this adds items to the action bar if it is present.
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
			View rootView = inflater.inflate(R.layout.fragment_main, container,
					false);
			return rootView;
		}
	}

}
