package com.example.afidnh.hellomom;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.afidnh.hellomom.app.AppController;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by Afidnh on 20/02/2019.
 */

public class Login extends AppCompatActivity {
    ProgressDialog pDialog;
    Button btn_login;
    EditText txt_username, txt_password, txt_email;


    int success;
    ConnectivityManager conMgr;

    private String url = Server.URL + "/android/login.php";

    private static final String TAG = Login.class.getSimpleName();

    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";

    public final static String TAG_USERNAME = "username";
    public final static String TAG_ID = "id";
    public final static String TAG_NAMA = "nama";
    public final static String TAG_ALAMAT = "alamat";
    public final static String TAG_TANGGAL = "tanggal";
    public final static String TAG_NOMER = "nomer";
    public final static String TAG_KEPALA = "kepala";
    public final static String TAG_LAHIR = "lahir";

    String tag_json_obj = "json_obj_req";

    SharedPreferences sharedpreferences;
    Boolean session = false;
    String id, username, tanggal, alamat, nama, nomer, kepala,lahir;
    public static final String my_shared_preferences = "my_shared_preferences";
    public static final String session_status = "session_status";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        conMgr = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        {
            if (conMgr.getActiveNetworkInfo() != null
                    && conMgr.getActiveNetworkInfo().isAvailable()
                    && conMgr.getActiveNetworkInfo().isConnected()) {
            } else {
                Toast.makeText(getApplicationContext(), "No Internet Connection",
                        Toast.LENGTH_LONG).show();
            }
        }

        btn_login = (Button) findViewById(R.id.button_login);
        txt_username = (EditText) findViewById(R.id.txt_username);
        txt_password = (EditText) findViewById(R.id.txt_password);


        // Cek session login jika TRUE maka langsung buka MainActivityBerita
        sharedpreferences = getSharedPreferences(my_shared_preferences, Context.MODE_PRIVATE);
        session = sharedpreferences.getBoolean(session_status, false);
        id = sharedpreferences.getString(TAG_ID, null);
        nama = sharedpreferences.getString(TAG_NAMA, null);
        username = sharedpreferences.getString(TAG_USERNAME, null);
        alamat  = sharedpreferences.getString(TAG_ALAMAT, null);
        tanggal = sharedpreferences.getString(TAG_TANGGAL, null);
        nomer = sharedpreferences.getString(TAG_NOMER, null);
        kepala = sharedpreferences.getString(TAG_KEPALA, null);
        lahir = sharedpreferences.getString(TAG_LAHIR, null);

        if (session) {
            Intent intent = new Intent(Login.this, MainActivity.class);
            intent.putExtra(TAG_ID, id);
            intent.putExtra(TAG_USERNAME, username);
            intent.putExtra(TAG_NAMA, nama);
            intent.putExtra(TAG_ALAMAT, alamat);
            intent.putExtra(TAG_TANGGAL, tanggal);
            intent.putExtra(TAG_NOMER, nomer);
            intent.putExtra(TAG_KEPALA, kepala);
            intent.putExtra(TAG_LAHIR, lahir);
            finish();
            startActivity(intent);
        }


        btn_login.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                String username = txt_username.getText().toString();
                String password = txt_password.getText().toString();

                // mengecek kolom yang kosong
                if (username.trim().length() > 0 && password.trim().length() > 0) {
                    if (conMgr.getActiveNetworkInfo() != null
                            && conMgr.getActiveNetworkInfo().isAvailable()
                            && conMgr.getActiveNetworkInfo().isConnected()) {
                        checkLogin(username, password);
                    } else {
                        Toast.makeText(getApplicationContext() ,"No Internet Connection", Toast.LENGTH_LONG).show();
                    }
                } else {
                    // Prompt user to enter credentials
                    Toast.makeText(getApplicationContext() ,"Kolom tidak boleh kosong", Toast.LENGTH_LONG).show();
                }
            }
        });

    }

    private void checkLogin(final String username, final String password) {
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);
        pDialog.setMessage("Logging in ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e(TAG, "Login Response: " + response.toString());
                hideDialog();

                try {
                    JSONObject jObj = new JSONObject(response);
                    success = jObj.getInt(TAG_SUCCESS);

                    // Check for error node in json
                    if (success == 1) {
                        String username = jObj.getString(TAG_USERNAME);
                        String id = jObj.getString(TAG_ID);
                        String nama = jObj.getString(TAG_NAMA);
                        String alamat = jObj.getString(TAG_ALAMAT);
                        String tanggal = jObj.getString(TAG_TANGGAL);
                        String nomer = jObj.getString(TAG_NOMER);
                        String kepala = jObj.getString(TAG_KEPALA);
                        String lahir = jObj.getString(TAG_LAHIR);

                        Log.e("Successfully Login!", jObj.toString());

                        Toast.makeText(getApplicationContext(), jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();

                        // menyimpan login ke session
                        SharedPreferences.Editor editor = sharedpreferences.edit();
                        editor.putBoolean(session_status, true);
                        editor.putString(TAG_ID, id);
                        editor.putString(TAG_NAMA, nama);
                        editor.putString(TAG_USERNAME, username);
                        editor.putString(TAG_ALAMAT, alamat);
                        editor.putString(TAG_TANGGAL, tanggal);
                        editor.putString(TAG_KEPALA, kepala);
                        editor.putString(TAG_NOMER, nomer);
                        editor.putString(TAG_LAHIR, lahir);
                        editor.commit();

                        // Memanggil main activity
                        Intent intent = new Intent(Login.this, MainActivity.class);
                        intent.putExtra(TAG_ID, id);
                        intent.putExtra(TAG_USERNAME, username);
                        intent.putExtra(TAG_NAMA, nama);
                        intent.putExtra(TAG_ALAMAT, alamat);
                        intent.putExtra(TAG_TANGGAL, tanggal);
                        intent.putExtra(TAG_NOMER, nomer);
                        intent.putExtra(TAG_KEPALA, kepala);
                        intent.putExtra(TAG_LAHIR, lahir);
                        finish();
                        startActivity(intent);
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
                Log.e(TAG, "Login Error: " + error.getMessage());
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
                params.put("password", password);

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
