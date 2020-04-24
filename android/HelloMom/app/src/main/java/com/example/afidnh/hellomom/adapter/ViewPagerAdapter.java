package com.example.afidnh.hellomom.adapter;

import android.content.Context;
import android.support.v4.view.PagerAdapter;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.afidnh.hellomom.R;


/**
 * Created by rezza on 4/8/17.
 */

public class ViewPagerAdapter extends PagerAdapter {

    Context mContext;
    LayoutInflater mLayoutInflater;
    String[][] urlImage;

    public ViewPagerAdapter(Context context, String[][] dataImage) {
        mContext = context;
        mLayoutInflater = (LayoutInflater) mContext.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        this.urlImage = dataImage;

    }

    @Override
    public int getCount() {
        return urlImage.length;
    }

    @Override
    public boolean isViewFromObject(View view, Object object) {
        return view == ((RelativeLayout) object);
    }

    @Override
    public Object instantiateItem(ViewGroup container, int position) {
        View itemView = mLayoutInflater.inflate(R.layout.viewpager_item, container, false);

        TextView description = (TextView) itemView.findViewById(R.id.description);
        ImageView imageView = (ImageView) itemView.findViewById(R.id.image);

        if(urlImage[position][1].isEmpty()){
            description.setVisibility(View.GONE);
        }else{
            description.setText(urlImage[position][1]);
        }
        Sam_imageDownloader.download(urlImage[position][0],imageView);

        container.addView(itemView);

        return itemView;
    }

    @Override
    public void destroyItem(ViewGroup container, int position, Object object) {
        container.removeView((RelativeLayout) object);
    }
}


