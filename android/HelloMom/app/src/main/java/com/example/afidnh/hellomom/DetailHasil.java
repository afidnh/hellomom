package com.example.afidnh.hellomom;

import android.os.Bundle;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.text.Html;
import android.util.Log;
import android.view.MenuItem;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.NetworkImageView;
import com.android.volley.toolbox.StringRequest;
import com.example.afidnh.hellomom.app.AppController;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by Afidnh on 11/05/2019.
 */

public class DetailHasil extends AppCompatActivity implements SwipeRefreshLayout.OnRefreshListener {

    NetworkImageView thumb_image;
    TextView tri, tgl, berat, keluhan, tekanan, umur, fundus, denyut, hasil, letak, tindakan, nasehat;
    ImageLoader imageLoader = AppController.getInstance().getImageLoader();
    SwipeRefreshLayout swipe;
    String id_news;

    private static final String TAG = DetailHasil.class.getSimpleName();

    public static final String TAG_ID = "id";
    public static final String TAG_TRI = "tri";
    public static final String TAG_TGL = "tgl";
    public static final String TAG_KELUHAN = "keluhan";
    public static final String TAG_TEKANAN = "tekanan";
    public static final String TAG_UMUR = "umur";
    public static final String TAG_FUNDUS = "fundus";
    public static final String TAG_DENYUT = "denyut";
    public static final String TAG_HASIL = "hasil";
    public static final String TAG_LETAK = "letak";
    public static final String TAG_TINDAKAN = "tindakan";
    public static final String TAG_NASEHAT = "nasehat";
    public static final String TAG_BERAT = "berat";

    private static final String url_detail = Server.URL + "/android/hasil_detail.php";
    String tag_json_obj = "json_obj_req";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.detail_hasil);
        setTitle("Detail News");

        swipe = (SwipeRefreshLayout) findViewById(R.id.swipe_refresh_layout);


        tri = (TextView) findViewById(R.id.judul_news);
        tgl = (TextView) findViewById(R.id.tgl_news);
        berat = (TextView) findViewById(R.id.isi_news);
        keluhan = (TextView) findViewById(R.id.keluhan);
        tekanan = (TextView) findViewById(R.id.tekanan);
        umur = (TextView) findViewById(R.id.umur);
        fundus = (TextView) findViewById(R.id.fundus);
        denyut = (TextView) findViewById(R.id.denyut);
        hasil = (TextView) findViewById(R.id.hasil);
        letak = (TextView) findViewById(R.id.letak);
        tindakan = (TextView) findViewById(R.id.tindakan);
        nasehat = (TextView) findViewById(R.id.nasehat);
        swipe = (SwipeRefreshLayout) findViewById(R.id.swipe_refresh_layout);

        id_news = getIntent().getStringExtra(TAG_ID);

        swipe.setOnRefreshListener(this);

        swipe.post(new Runnable() {
                       @Override
                       public void run() {
                           if (!id_news.isEmpty()) {
                               callDetailNews(id_news);
                           }
                       }
                   }
        );

    }

    private void callDetailNews(final String id) {
        swipe.setRefreshing(true);

        StringRequest strReq = new StringRequest(Request.Method.POST, url_detail, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e(TAG, "Response " + response.toString());
                swipe.setRefreshing(false);

                try {
                    JSONObject obj = new JSONObject(response);

                    String Tri = obj.getString(TAG_TRI);
                    String Tgl = obj.getString(TAG_TGL);
                    String Keluhan = obj.getString(TAG_KELUHAN);
                    String Tekanan = obj.getString(TAG_TEKANAN);
                    String Umur = obj.getString(TAG_UMUR);
                    String Fundus = obj.getString(TAG_FUNDUS);
                    String Denyut = obj.getString(TAG_DENYUT);
                    String Hasil = obj.getString(TAG_HASIL);
                    String Letak = obj.getString(TAG_LETAK);
                    String Tindakan = obj.getString(TAG_TINDAKAN);
                    String Nasehat = obj.getString(TAG_NASEHAT);
                    String Berat = obj.getString(TAG_BERAT);

                    tri.setText(Tri);
                    tgl.setText(Tgl);
                    keluhan.setText(Html.fromHtml(Keluhan));
                    tekanan.setText(Tekanan);
                    umur.setText(Umur);
                    fundus.setText(Fundus);
                    denyut.setText(Denyut);
                    hasil.setText(Hasil);
                    letak.setText(Letak);
                    berat.setText(Berat);
                    tindakan.setText(Html.fromHtml(Tindakan));
                    nasehat.setText(Html.fromHtml(Nasehat));

                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Detail News Error: " + error.getMessage());
                Toast.makeText(DetailHasil.this,
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
        callDetailNews(id_news);
    }
}
