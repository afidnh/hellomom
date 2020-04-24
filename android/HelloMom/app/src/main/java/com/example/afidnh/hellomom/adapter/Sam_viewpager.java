package com.example.afidnh.hellomom.adapter;

import android.os.Handler;
import android.support.v4.view.ViewPager;

import java.util.Timer;
import java.util.TimerTask;


public class Sam_viewpager {

    private static int currentPosition, itemCount = 0;



    public static void setAutoScroll(final ViewPager viewpager, final int scrollInterval){
        itemCount = viewpager.getAdapter().getCount();
        currentPosition = 0;
        final Handler h = new Handler();

        Timer t = new Timer();
        t.schedule(new TimerTask() {
            public void run() {
                h.post(new Runnable() {
                    @Override
                    public void run() {
                        currentPosition++;
                        if(currentPosition == itemCount ) currentPosition = 0;
                        viewpager.setCurrentItem(currentPosition,true);
                    }
                });
            }
        }, scrollInterval, scrollInterval);
    }


}
