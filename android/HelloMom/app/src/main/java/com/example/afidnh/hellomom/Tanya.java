package com.example.afidnh.hellomom;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.AbsListView;
import android.widget.AdapterView;
import android.widget.ImageButton;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.example.afidnh.hellomom.adapter.TanyaAdapter;
import com.example.afidnh.hellomom.app.AppController;
import com.example.afidnh.hellomom.data.NewsData;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * Created by Afidnh on 11/10/2018.
 */

public class Tanya extends AppCompatActivity implements SwipeRefreshLayout.OnRefreshListener {

    ProgressDialog pDialog;
    List<NewsData> newsList = new ArrayList<NewsData>();
    TanyaAdapter adapter;
    SwipeRefreshLayout swipe;
    ListView list_view;
    Handler handler;
    Runnable runnable;
    ImageButton pertanyaan;

    /* 10.0.2.2 adalah IP Address localhost EMULATOR ANDROID STUDIO,
    Ganti IP Address tersebut dengan IP Laptop Apabila di RUN di HP. HP dan Laptop harus 1 jaringan */

    public static final String url_cari = Server.URL + "/android/tanya.php";

    private static final String TAG = Tanya.class.getSimpleName();

    public static final String TAG_ID = "id";
    public static final String TAG_JUDUL = "judul";
    public static final String TAG_TGL = "tgl";
    public static final String TAG_RESULTS = "results";
    public static final String TAG_MESSAGE = "message";
    public static final String TAG_VALUE = "value";

    String tag_json_obj = "json_obj_req";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tanya);

        swipe = (SwipeRefreshLayout) findViewById(R.id.swipe_refresh_layout);
        list_view = (ListView) findViewById(R.id.list_news);
         pertanyaan = (ImageButton) findViewById(R.id.pertanyaan) ;

        adapter = new TanyaAdapter(Tanya.this, newsList);
        list_view.setAdapter(adapter);
        final String keyword = getIntent().getStringExtra(TAG_ID);

        swipe.setOnRefreshListener(this);

        swipe.post(new Runnable() {
                       @Override
                       public void run() {
                           swipe.setRefreshing(true);
                           cariData(keyword);
                       }
                   }
        );

        list_view.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view,
                                    int position, long id) {
                // TODO Auto-generated method stub
                Intent intent = new Intent(Tanya.this, DetailTanya.class);
                intent.putExtra(TAG_ID, newsList.get(position).getId());
                startActivity(intent);
            }
        });

        pertanyaan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String id = Tanya.this.getIntent().getStringExtra(TAG_ID);
                Intent berita = new Intent(Tanya.this, BuatPertanyaan.class);
                berita.putExtra(TAG_ID, id);
                startActivity(berita);
            }
        });
    }


    @Override
    public void onRefresh() {
        String keyword = getIntent().getStringExtra(TAG_ID);
        cariData(keyword);
    }

    private void cariData(final String keyword) {
        pDialog = new ProgressDialog(Tanya.this);
        pDialog.setCancelable(false);
        pDialog.setMessage("Loading...");
        pDialog.show();

        StringRequest strReq = new StringRequest(Request.Method.POST, url_cari, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e("Response: ", response.toString());

                try {
                    JSONObject jObj = new JSONObject(response);

                    int value = jObj.getInt(TAG_VALUE);

                    if (value == 1) {
                        newsList.clear();
                        adapter.notifyDataSetChanged();

                        String getObject = jObj.getString(TAG_RESULTS);
                        JSONArray jsonArray = new JSONArray(getObject);

                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject obj = jsonArray.getJSONObject(i);

                            NewsData data = new NewsData();

                            data.setId(obj.getString(TAG_ID));
                            data.setJudul(obj.getString(TAG_JUDUL));
                            data.setDatetime(obj.getString(TAG_TGL));

                            newsList.add(data);
                        }

                    } else {
                        Toast.makeText(getApplicationContext(), jObj.getString(TAG_MESSAGE), Toast.LENGTH_SHORT).show();
                    }

                } catch (JSONException e) {
                    // JSON error
                    e.printStackTrace();
                }

                adapter.notifyDataSetChanged();
                pDialog.dismiss();
                swipe.setRefreshing(false);
            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.e(TAG, "Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_SHORT).show();
                pDialog.dismiss();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Posting parameters to login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("keyword", keyword);

                return params;
            }

        };

        AppController.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }

}