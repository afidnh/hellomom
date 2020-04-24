package com.example.afidnh.hellomom;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.location.Location;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.Fragment;
import android.support.v4.content.ContextCompat;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.CardView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.afidnh.hellomom.adapter.Sam_viewpager;
import com.example.afidnh.hellomom.adapter.ViewPagerAdapter;

import java.util.Locale;
import java.util.concurrent.TimeUnit;


/**
 * Created by Afidnh on 21/02/2019.
 */

public class Home extends Fragment {
    private static final String TAG1 = "Home";
    public final static String TAG_ID = "id";
    Dialog myDialog;
    private static final int MY_PERMISSIONS_REQUEST_GET_ACCOUNTS = 1;

    String[][] url_review = {
            {"https://jurnalapps.co.id/assets/img/content/1530586762_1.jpg",""},
            {"https://tandaawalkehamilan.com/wp-content/uploads/2018/12/Info-Kesehatan-Ibu-Hamil-yang-Penting-untuk-Diketahui.jpg",""},
            {"https://doktersehat.com/wp-content/uploads/2016/01/shutterstock_190732922-copy.jpg",""}};

    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_home,container,false);
        ViewPager news_slider = (ViewPager) view.findViewById(R.id.news_slider);
        CardView mycard = (CardView) view.findViewById(R.id.bankcardId);
        CardView tanyacard = (CardView) view.findViewById(R.id.cardtanya);
        CardView beritacard = (CardView) view.findViewById(R.id.cardberita);
        CardView hasil = (CardView) view.findViewById(R.id.cardhasil);
        final CardView jadwal = (CardView) view.findViewById(R.id.cardjadwal);


        tanyacard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String id = getActivity().getIntent().getStringExtra(TAG_ID);
                Intent tanya = new Intent(getActivity(), Tanya.class);
                tanya.putExtra(TAG_ID, id);
                startActivity(tanya);
            }
        });


        hasil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String id = getActivity().getIntent().getStringExtra(TAG_ID);
                Intent hasil = new Intent(getActivity(), Hasil.class);
                hasil.putExtra(TAG_ID, id);
                startActivity(hasil);
            }
        });

        beritacard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String id = getActivity().getIntent().getStringExtra(TAG_ID);
                Intent berita = new Intent(getActivity(), Berita.class);
                berita.putExtra(TAG_ID, id);
                startActivity(berita);
            }
        });

        jadwal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String id = getActivity().getIntent().getStringExtra(TAG_ID);
                Intent jadwal = new Intent(getActivity(), Jadwal.class);
                jadwal.putExtra(TAG_ID, id);
                startActivity(jadwal);

            }
        });

        mycard.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog dialog = new AlertDialog.Builder(getActivity())
                        .setTitle("PERINGATAN !!")
                        .setMessage("Klik batal untuk urungkan laporan")
                        .setPositiveButton(android.R.string.yes, new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                // TODO: Add positive button action code here
                                Intent intent = new Intent(getActivity(), Laporan.class);
                                startActivity(intent);
                            }
                        })
                        .setNegativeButton(android.R.string.no, null)
                        .create();
                dialog.setOnShowListener(new DialogInterface.OnShowListener() {
                    private static final int AUTO_DISMISS_MILLIS = 6000;
                    @Override
                    public void onShow(final DialogInterface dialog) {
                        final Button defaultButton = ((AlertDialog) dialog).getButton(AlertDialog.BUTTON_POSITIVE);
                        final CharSequence negativeButtonText = defaultButton.getText();
                        new CountDownTimer(AUTO_DISMISS_MILLIS, 100) {
                            @Override
                            public void onTick(long millisUntilFinished) {
                                defaultButton.setText(String.format(
                                        Locale.getDefault(), "%s (%d)",
                                        negativeButtonText,
                                        TimeUnit.MILLISECONDS.toSeconds(millisUntilFinished) + 1
                                ));
                            }
                            @Override
                            public void onFinish() {
                                if (((AlertDialog) dialog).isShowing()) {
                                    Intent intent = new Intent(getActivity(), Laporan.class);
                                    startActivity(intent);
                                }
                            }
                        }.start();
                    }
                });
                dialog.show();
            }


        });

        ViewPagerAdapter adapter = new ViewPagerAdapter(this.getActivity(),url_review);
        news_slider.setAdapter(adapter);
        Sam_viewpager.setAutoScroll(news_slider,5000);

//        myDialog = new Dialog(getActivity());
        getPermissions();

        return view;
    }


    public void getPermissions() {
        /* Check and Request permission */
        if (ActivityCompat.checkSelfPermission(this.getActivity(), Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this.getActivity(), Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            ActivityCompat.requestPermissions(this.getActivity(),
                    new String[]{Manifest.permission.ACCESS_FINE_LOCATION},
                    MY_PERMISSIONS_REQUEST_GET_ACCOUNTS);
            return;
        }
    }

    @Override
    public void onRequestPermissionsResult(int requestCode,String permissions[], int[] grantResults) {
        switch (requestCode) {
            case MY_PERMISSIONS_REQUEST_GET_ACCOUNTS: {
                // If request is cancelled, the result arrays are empty.
                if (grantResults.length > 0
                        && grantResults[0] == PackageManager.PERMISSION_GRANTED) {

                    // permission was granted, yay! Do the
                    // contacts-related task you need to do.

                } else {

                    // permission denied, boo! Disable the
                    // functionality that depends on this permission..
                    Toast.makeText(this.getActivity(), "Permission denied to get Account", Toast.LENGTH_SHORT).show();

                }
                return;
            }

            // other 'case' lines to check for other
            // permissions this app might request
        }
    }
}