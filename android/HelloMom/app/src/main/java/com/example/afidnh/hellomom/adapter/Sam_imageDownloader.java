package com.example.afidnh.hellomom.adapter;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.widget.ImageView;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.HashMap;

/**
 * Created by rezza on 4/8/17.
 * http://stackoverflow.com/questions/37510411/download-an-image-into-bitmap-file-in-android
 */

public class Sam_imageDownloader {

    private static HashMap<String,Bitmap> sam_bitmap = new HashMap<>();

    public static void download(String url, ImageView img){
        if(!sam_bitmap.containsKey(url)){
            GetBitmapFromURLAsync gb = new GetBitmapFromURLAsync(img);
            gb.execute(url);
        }else{
            img.setImageBitmap(sam_bitmap.get(url));
        }
    }

    private static class GetBitmapFromURLAsync extends AsyncTask<String, Void, Bitmap> {
        private ImageView img;
        private String url;

        public GetBitmapFromURLAsync(ImageView img) {
            this.img = img;
        }

        @Override
        protected Bitmap doInBackground(String... params) {
            url = params[0];
            return getBitmapFromURL(params[0]);
        }

        @Override
        protected void onPostExecute(Bitmap bitmap) {
            //  return the bitmap by doInBackground and store in result
            if(bitmap!=null){
                sam_bitmap.put(url,bitmap);
                img.setImageBitmap(bitmap);
            }
        }
    }

    public static Bitmap getBitmapFromURL(String src) {
        try {
            URL url = new URL(src);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setDoInput(true);
            connection.connect();
            InputStream input = connection.getInputStream();
            Bitmap myBitmap = BitmapFactory.decodeStream(input);
            return myBitmap;
        } catch (IOException e) {
            e.printStackTrace();
            return null;
        }
    }
}
