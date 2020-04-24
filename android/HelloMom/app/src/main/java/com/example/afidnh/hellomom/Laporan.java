package com.example.afidnh.hellomom;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.location.Location;
import android.net.ConnectivityManager;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.afidnh.hellomom.app.AppController;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.tasks.OnSuccessListener;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.afidnh.hellomom.Login.session_status;

/**
 * Created by Afidnh on 26/02/2019.
 */

public class Laporan extends AppCompatActivity {

    ProgressDialog pDialog;
    TextView txt_id, txt_username, txt_nama, txt_alamat, txt_tanggal, txt_laporan;
    String id, username, nama, alamat, tanggal;
    SharedPreferences sharedpreferences;
    Boolean session = false;

    public static final String TAG_ID = "id";
    public static final String TAG_USERNAME = "username";
    public static final String TAG_NAMA = "nama";
    public static final String TAG_ALAMAT = "alamat";
    public static final String TAG_TANGGAL = "tanggal";

    int success;
    ConnectivityManager conMgr;

    private String url = Server.URL + "/android/laporan.php";

    private static final String TAG = Laporan.class.getSimpleName();

    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";

    String tag_json_obj = "json_obj_req";

    @SuppressLint("MissingPermission")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_laporan);
        sharedpreferences = getSharedPreferences(Login.my_shared_preferences, Context.MODE_PRIVATE);
        session = sharedpreferences.getBoolean(session_status, false);
        id = sharedpreferences.getString(TAG_ID, null);
        nama = sharedpreferences.getString(TAG_NAMA, null);
        username = sharedpreferences.getString(TAG_USERNAME, null);
        alamat  = sharedpreferences.getString(TAG_ALAMAT, null);
        tanggal = sharedpreferences.getString(TAG_TANGGAL, null);


        txt_id = (TextView) findViewById(R.id.txt_id);
        txt_nama = (TextView) findViewById(R.id.txt_password);
        txt_username =  (TextView) findViewById(R.id.txt_username);
        txt_alamat = (TextView) findViewById(R.id.txt_email);
        txt_tanggal = (TextView) findViewById(R.id.txt_phone);
        txt_laporan = (TextView) findViewById(R.id.txt_laporan);

        txt_id.setText("ID : " + id);
        txt_username.setText("USERNAME : " + username);
        txt_nama.setText("Nama : " + nama);
        txt_alamat.setText("EMAIL : " + alamat);
        txt_tanggal.setText("Perkiraan Tanggal Kelahiran : " + tanggal);

        final String laporan = "Darurat";
        txt_laporan.setText("Level Laporan : " +laporan);

        // GET CURRENT LOCATION
        FusedLocationProviderClient mFusedLocation = LocationServices.getFusedLocationProviderClient(this);
        mFusedLocation.getLastLocation().addOnSuccessListener(this, new OnSuccessListener<Location>() {
            @Override
            public void onSuccess(Location location) {
                if (location != null){
                    // Do it all with location
                    Log.d("My Current location", "Lat : " + location.getLatitude() + " Long : " + location.getLongitude());
                    // Display in Toast
                    Toast.makeText(Laporan.this,
                            "Lat : " + location.getLatitude() + " Long : " + location.getLongitude(),
                            Toast.LENGTH_LONG).show();
                    Double Lat = location.getLatitude();
                    Double Long = location.getLongitude();
                    String latitude = String.valueOf(Lat);
                    String longitude = String.valueOf(Long);
                    checkRegister(username, id, laporan, latitude, longitude);

                }

            }
        });


    }

    private void checkRegister(final String username, final String id, final String laporan, final String latitude, final String longitude) {
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);
        pDialog.setMessage("Laporan ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e(TAG, "Laporan Response: " + response.toString());
                hideDialog();

                try {
                    JSONObject jObj = new JSONObject(response);
                    success = jObj.getInt(TAG_SUCCESS);

                    // Check for error node in json
                    if (success == 1) {

                        Log.e("Laporan Berhasil Terkirim!", jObj.toString());

                        Toast.makeText(getApplicationContext(),
                                jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();
                    } else {
                        Toast.makeText(getApplicationContext(),
                                jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();

                    }
                } catch (JSONException e) {
                    // JSON error
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Laporan Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();

                hideDialog();

            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Posting parameters to login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("username", username);
                params.put("id", id);
                params.put("laporan", laporan);
                params.put("latitude", latitude);
                params.put("longitude", longitude);

                return params;
            }

        };

        // Adding request to request queue
        AppController.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }

    private void showDialog() {
        if (!pDialog.isShowing())
            pDialog.show();
    }

    private void hideDialog() {
        if (pDialog.isShowing())
            pDialog.dismiss();
    }

}