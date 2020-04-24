package com.example.afidnh.hellomom;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.afidnh.hellomom.app.AppController;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class BuatPertanyaan extends AppCompatActivity {


    Button buttonChoose;
    Button buttonUpload;
    Toolbar toolbar;
    ImageView imageView;
    TextView txt_id;
    EditText txt_name, txt_lokasi, txt_berita;
    Bitmap bitmap, decoded;
    int success;
    int PICK_IMAGE_REQUEST = 1;
    int bitmap_size = 60; // range 1 - 100
    String id, username, password, email, phone;
    SharedPreferences sharedpreferences;

    private static final String TAG = BuatPertanyaan.class.getSimpleName();

    /* 10.0.2.2 adalah IP Address localhost Emulator Android Studio. Ganti IP Address tersebut dengan
    IP Address Laptop jika di RUN di HP/Genymotion. HP/Genymotion dan Laptop harus 1 jaringan! */
    private String UPLOAD_URL = Server.URL +"/android/upload_image/upload.php";

    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";
    private String KEY_IMAGE = "image";
    private String KEY_ID = "id";
    private String KEY_NAME = "name";
    private String KEY_LOKASI = "lokasi";
    private String KEY_BERITA = "berita";
    public static final String TAG_ID = "id";
    public static final String TAG_USERNAME = "username";
    public static final String TAG_PASSWORD = "password";
    public static final String TAG_EMAIL = "email";
    public static final String TAG_PHONE = "phone";


    String tag_json_obj = "json_obj_req";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_buat_pertanyaan);
//        toolbar = (Toolbar) findViewById(R.id.toolbar);
//        setSupportActionBar(toolbar);

        buttonChoose = (Button) findViewById(R.id.buttonChoose);
        buttonUpload = (Button) findViewById(R.id.buttonupload);

        txt_id = (TextView) findViewById(R.id.penulis);
        txt_berita = (EditText) findViewById(R.id.editText6);

        imageView = (ImageView) findViewById(R.id.imageView);

        buttonChoose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showFileChooser();
            }
        });

        buttonUpload.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                uploadImage();
            }
        });

        sharedpreferences = getSharedPreferences(Login.my_shared_preferences, Context.MODE_PRIVATE);

        id = getIntent().getStringExtra(TAG_ID);
        username = getIntent().getStringExtra(TAG_USERNAME);
        password = getIntent().getStringExtra(TAG_PASSWORD);
        email = getIntent().getStringExtra(TAG_EMAIL);
        phone = getIntent().getStringExtra(TAG_PHONE);
        txt_id.setText(id);



    }

    public String getStringImage(Bitmap bmp) {
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, bitmap_size, baos);
        byte[] imageBytes = baos.toByteArray();
        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;
    }

    private void uploadImage() {
        //menampilkan progress dialog
        final ProgressDialog loading = ProgressDialog.show(this, "Uploading...", "Please wait...", false, false);
        StringRequest stringRequest = new StringRequest(Request.Method.POST, UPLOAD_URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.e(TAG, "Response: " + response.toString());

                        try {
                            JSONObject jObj = new JSONObject(response);
                            success = jObj.getInt(TAG_SUCCESS);

                            if (success == 1) {
                                Log.e("v Add", jObj.toString());

                                Toast.makeText(BuatPertanyaan.this, jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();

                                kosong();

                            } else {
                                Toast.makeText(BuatPertanyaan.this, jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                        //menghilangkan progress dialog
                        loading.dismiss();
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        //menghilangkan progress dialog
                        loading.dismiss();

                        //menampilkan toast
                        Toast.makeText(BuatPertanyaan.this, error.getMessage().toString(), Toast.LENGTH_LONG).show();
                        Log.e(TAG, error.getMessage().toString());
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                //membuat parameters
                Map<String, String> params = new HashMap<String, String>();

                String gambar = "/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAA0JCgsKCA0LCgsODg0PEyAVExISEyccHhcgLikxMC4p\n" +
                        "                                                                             LSwzOko+MzZGNywtQFdBRkxOUlNSMj5aYVpQYEpRUk//2wBDAQ4ODhMREyYVFSZPNS01T09PT09P\n" +
                        "                                                                             T09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0//wAARCAIAAgADASIA\n" +
                        "                                                                             AhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQA\n" +
                        "                                                                             AAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3\n" +
                        "                                                                             ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWm\n" +
                        "                                                                             p6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEA\n" +
                        "                                                                             AwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSEx\n" +
                        "                                                                             BhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElK\n" +
                        "                                                                             U1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3\n" +
                        "                                                                             uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD06iii\n" +
                        "                                                                             gAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoppZR1I/Om\n" +
                        "                                                                             tNGvVx+dAElFVX1C2T7z1EdXsx/GfyoAv0VmnWbbsx/Km/2zB6/pQBqUVl/2zB6/pThrNt3Y/lQB\n" +
                        "                                                                             pUVQGr2Z/jP5VKmoWz/degC1RUSTxv0cfnTwynow/OgB1FFFABRRRQAUUUUAFFFFABRRRQAUUUUA\n" +
                        "                                                                             FFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAU\n" +
                        "                                                                             UUUAFFFFABRRSEgdaAFoqtPewQDMj/lzWbca2eRCoI9TQBsswUZY4FVpdQtox/rFJ9Aa52S8uJSc\n" +
                        "                                                                             yNg9hTY7eadvlQk+9AGvLraZISNvrmqUur3LfdYAfSnQ6PcN/rAFHsauxaLEvLOxPpigDGe7mk+8\n" +
                        "                                                                             /wCVNWOZ/uhz+NdOlhbIP9Wp+oqVYIl+7GooA5YWl03/ACxc1IunXLdYyPqK6kADoKWgDmRpNwfb\n" +
                        "                                                                             8Kd/Y8/94flXSUUAc3/Y8/8AeH5U06TcD3/CumooA5VtOuV6Rk/QVGbS6X/li9ddSEA9RQBx5jmT\n" +
                        "                                                                             7wcfjTo7qaL7r/nXVNBE33o1NRPYWzj/AFSj6CgDEi1e6X7zAj6Vch1tekkbfXNPl0WFuVdh7AVT\n" +
                        "                                                                             m0adSfKAYe5oA14tQtpB/rFB9CasqyuMqciuSktpoD8yEH2p0V3cRNxI3HY0AdbRWHb62ekygD1F\n" +
                        "                                                                             acF7BOMo/wCfFAFmikBB6HNLQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUU\n" +
                        "                                                                             UUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSHgZNVrm9htly7c+3NYl3qk05IQ7F9RQBsX\n" +
                        "                                                                             WpQW4OGDkdgax7nVZ5chDtX0qrFBNcP8ikk9zWtaaMBhpyc+lAGQqTTt8qs59qv2+jyyYZ2Cj0Ir\n" +
                        "                                                                             cit4oR+7QD6VLQBRg0u2i525araoqjhR+VPooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC\n" +
                        "                                                                             iiigBjIrDBUflVSfTLaXJ24P1q9RQBz1xo0seWjYMPQCs945oT86sldjUUsEUo/eID9aAOftdVnh\n" +
                        "                                                                             wGO5R2rYtdSguByQh9Cap3WjA5aAnPpWTLbzWz4dSCO4oA64HIyKWuZtNUmgIDHevua3LW9huVyj\n" +
                        "                                                                             c+/FAFqiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigA\n" +
                        "                                                                             ooooAKKKq3d7FaoS557AUATySJGu52Cj1NY19q5JKW/H+1VC6vprpuTgegqSy06W5O4jCUAVQJbi\n" +
                        "                                                                             Q7QXY+la1no2cPOeP7taVrZxWygIMn1NWaAI4oY4lCooAFSUUUAFFFFABRRRQAUUUUAFFFFABRRR\n" +
                        "                                                                             QAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFMkiSVSrqCDT6KAMW80bq8Bx/s1kFZbeT5gUY\n" +
                        "                                                                             etdjVa5s4rhSHUZPfvQBmWOrkEJPz71sxyJKu6Ngw9RXN3umy2xLKMp+tR2t7Nat8pyPQ0AdXRVW\n" +
                        "                                                                             0vYrpAVPPcGrVABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFI\n" +
                        "                                                                             TjrWTqWpiPMUPLdzQBNqGpJbqUjO5/btWA7yXMuTlmPaiOOW5lwuWY9zXQWGmpbqGcbn96AK2n6S\n" +
                        "                                                                             ABJcDn+76VrqoUAKMAU6igAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA\n" +
                        "                                                                             KKKKACiiigAooooAKKKKACiiigAooooAayhgQRkGsjUNJBBktxz/AHfWtmigDj0eW2lyMqw7Vv6d\n" +
                        "                                                                             qSXChJDtf3706/06O4UlRtf2rnpYpbaXa2VYdxQB2FFY+mapvxFNwexrXBB6UALRRRQAUUUUAFFF\n" +
                        "                                                                             FABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSHgZpayNV1Dyx5MR+Y9TQAzVNSxmGE/Uisu2t5LqX\n" +
                        "                                                                             aoJz1NFtbyXUwVcnPU10tnaJaxgKPm7mgBLKzjtY8KBuPU1aoooAKKKKACiiigAooooAKKKKACii\n" +
                        "                                                                             igAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKq3t\n" +
                        "                                                                             nHdR4YDcOhq1RQByNzbyWsuGBGOhrT0vUukMx9gTWnd2qXMZVhz2Nczc20lrKVbIx0NAHWg5GRS1\n" +
                        "                                                                             j6TqO/8AcynkdDWxQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFVb66W1gLE89AKAINUv\n" +
                        "                                                                             xbxmNDl24+lYEcclzPtXLMx5okeS5myeWY8Vv6XYi3iDsPnPNAE9jZpaxADBbuatUUUAFFFFABRR\n" +
                        "                                                                             RQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFF\n" +
                        "                                                                             ABRRRQAUUUUAFFFFABRRRQAVVvbNLqIqcBux9KtUUAcfLFJbTbWyGByK3tKvxPGI5D844+tP1OyF\n" +
                        "                                                                             zEWUfOK55GktpsjhloA7CiqthdLdQBgeRwRVqgAooooAKKKKACiiigAooooAKKKKACiiigBkjiON\n" +
                        "                                                                             nbooya5e/umurgnsOBV/Wb0lvIjPT71VNMszczgt9wUAXtHsAB58o5/h9q2aaqhVAAwBTqACiiig\n" +
                        "                                                                             AooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAC\n" +
                        "                                                                             iiigAooooAKKKKACiiigAooooAKKKKACiiigArG1iwDAzxjnv71s01lDKQRkGgDlbG5a1nDDoeDX\n" +
                        "                                                                             UxSLLGHU5B6VzmqWZtpiV+4as6LebW8iQ8H7tAG7RRRQAUUUUAFFFFABRRRQAUUUUAFVb65Ftbs5\n" +
                        "                                                                             69KsnjrXN6tdGe4KA/KvFAFNQ9xOFzlnOK6iyt1toAoGCetZuiWmczuOP4a26ACiiigAooooAKKK\n" +
                        "                                                                             KACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAoooo\n" +
                        "                                                                             AKKKKACiiigAooooAKKKKACiiigAooooAKKKKAK97b";

                if (decoded == null){
                    //menambah parameter yang di kirim ke web servis
                    params.put(KEY_IMAGE, gambar.toString().trim());
                    params.put(KEY_ID, txt_id.getText().toString().trim());
                    params.put(KEY_BERITA, txt_berita.getText().toString().trim());

                }else {
                    //menambah parameter yang di kirim ke web servis
                    params.put(KEY_IMAGE, getStringImage(decoded));
                    params.put(KEY_ID, txt_id.getText().toString().trim());
                    params.put(KEY_BERITA, txt_berita.getText().toString().trim());
                }

//                params.put(KEY_IMAGE, getStringImage(decoded));
//                params.put(KEY_ID, txt_id.getText().toString().trim());
//                params.put(KEY_BERITA, txt_berita.getText().toString().trim());

                //kembali ke parameters
                Log.e(TAG, "" + params);
                return params;
            }
        };

        AppController.getInstance().addToRequestQueue(stringRequest, tag_json_obj);
    }

    private void showFileChooser() {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select Picture"), PICK_IMAGE_REQUEST);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == PICK_IMAGE_REQUEST && resultCode == RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            try {
                //mengambil fambar dari Gallery
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
                // 512 adalah resolusi tertinggi setelah image di resize, bisa di ganti.
                setToImageView(getResizedBitmap(bitmap, 512));
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    private void kosong() {
        imageView.setImageResource(0);
//        txt_id.setText(null);
        txt_berita.setText(null);
        Intent intentku= new Intent(BuatPertanyaan.this,Tanya.class);
        intentku.putExtra(TAG_ID, id);
        startActivity(intentku);
    }

    private void setToImageView(Bitmap bmp) {
        //compress image
        ByteArrayOutputStream bytes = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, bitmap_size, bytes);
        decoded = BitmapFactory.decodeStream(new ByteArrayInputStream(bytes.toByteArray()));

        //menampilkan gambar yang dipilih dari camera/gallery ke ImageView
        imageView.setImageBitmap(decoded);
    }

    // fungsi resize image
    public Bitmap getResizedBitmap(Bitmap image, int maxSize) {
        int width = image.getWidth();
        int height = image.getHeight();

        float bitmapRatio = (float) width / (float) height;
        if (bitmapRatio > 1) {
            width = maxSize;
            height = (int) (width / bitmapRatio);
        } else {
            height = maxSize;
            width = (int) (height * bitmapRatio);
        }
        return Bitmap.createScaledBitmap(image, width, height, true);
    }



}
