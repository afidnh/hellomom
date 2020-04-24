package com.example.afidnh.hellomom.adapter;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.NetworkImageView;
import com.example.afidnh.hellomom.R;
import com.example.afidnh.hellomom.Server;
import com.example.afidnh.hellomom.app.AppController;
import com.example.afidnh.hellomom.data.NewsData;

import java.util.List;

/**
 * Created by Afidnh on 11/05/2019.
 */

public class HasilAdapter extends BaseAdapter {
    private Activity activity;
    private LayoutInflater inflater;
    private List<NewsData> newsItems;
    ImageLoader imageLoader;

    public HasilAdapter(Activity activity, List<NewsData> newsItems) {
        this.activity = activity;
        this.newsItems = newsItems;
    }

    @Override
    public int getCount() {
        return newsItems.size();
    }

    @Override
    public Object getItem(int location) {
        return newsItems.get(location);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        if (inflater == null)
            inflater = (LayoutInflater) activity
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);

        if (convertView == null)
            convertView = inflater.inflate(R.layout.list_row_hasil, null);

        if (imageLoader == null)
            imageLoader = AppController.getInstance().getImageLoader();
//
//        NetworkImageView thumbNail = (NetworkImageView) convertView.findViewById(R.id.news_gambar);
        TextView judul = (TextView) convertView.findViewById(R.id.news_judul);
        TextView timestamp = (TextView) convertView.findViewById(R.id.news_timestamp);
//        TextView isi = (TextView) convertView.findViewById(R.id.news_isi);

        NewsData news = newsItems.get(position);

//        thumbNail.setImageUrl(Server.URL +news.getGambar(), imageLoader);
        judul.setText(news.getJudul());
        timestamp.setText(news.getDatetime());
//        isi.setText(Html.fromHtml(berita.getIsi()));

        return convertView;
    }

}