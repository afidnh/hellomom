package com.example.afidnh.hellomom;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.text.Html;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ListView;
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
 * Created by Afidnh on 11/05/2019.
 */

public class Jadwal extends AppCompatActivity implements SwipeRefreshLayout.OnRefreshListener {

    TextView judul, tgl, nama, alamat;
    SwipeRefreshLayout swipe;
    String id_news;
    Button close;

    private static final String TAG = Jadwal.class.getSimpleName();

    public static final String TAG_ID = "id";
    public static final String TAG_JUDUL = "judul";
    public static final String TAG_TGL = "tgl";
    public static final String TAG_NAMA = "nama";
    public static final String TAG_ALAMAT = "alamat";

    private static final String url_detail = Server.URL + "/android/jadwal.php";
    String tag_json_obj = "json_obj_req";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_jadwal);
        setTitle("Jadwal Checkup");

        judul = (TextView) findViewById(R.id.tri);
        tgl = (TextView) findViewById(R.id.jadwal);
        alamat = (TextView) findViewById(R.id.alamat);
        nama = (TextView) findViewById(R.id.nama);
        close = (Button) findViewById(R.id.button2);

        close.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                String id = getIntent().getStringExtra(TAG_ID);
                Intent intent = new Intent(Jadwal.this, MainActivity.class);
                intent.putExtra(TAG_ID, id);
                startActivity(intent);
            }
        });

        swipe = (SwipeRefreshLayout) findViewById(R.id.swipe_refresh_layout);

        id_news = getIntent().getStringExtra(TAG_ID);

        swipe.setOnRefreshListener(this);

        swipe.post(new Runnable() {
                       @Override
                       public void run() {
                           if (!id_news.isEmpty()) {
                               callJadwal(id_news);
                           }
                       }
                   }
        );



    }

    private void callJadwal(final String id) {
        swipe.setRefreshing(true);

        StringRequest strReq = new StringRequest(Request.Method.POST, url_detail, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e(TAG, "Response " + response.toString());
                swipe.setRefreshing(false);

                try {
                    JSONObject obj = new JSONObject(response);

                    String Judul = obj.getString(TAG_JUDUL);
                    String Tgl = obj.getString(TAG_TGL);
                    String Nama = obj.getString(TAG_NAMA);
                    String Alamat = obj.getString(TAG_ALAMAT);

                    judul.setText(Judul);
                    tgl.setText(Tgl);
                    nama.setText(Nama);
                    alamat.setText(Alamat);



                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Detail News Error: " + error.getMessage());
                Toast.makeText(Jadwal.this,
                        error.getMessage(), Toast.LENGTH_LONG).show();
                swipe.setRefreshing(false);
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Posting parameters to post url
                Map<String, String> params = new HashMap<String, String>();
                params.put("id", id);

                return params;
            }

        };

        // Adding request to request queue
        AppController.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }

    @Override
    public void onBackPressed() {
        finish();
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case android.R.id.home:
                this.finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    @Override
    public void onRefresh() {
        callJadwal(id_news);
    }
}