package com.example.afidnh.hellomom;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

/**
 * Created by Afidnh on 21/02/2019.
 */

public class Profile extends Fragment {
    private TextView txtTimerDay, txtTimerHour, txtTimerMinute, txtTimerSecond;
    private TextView tvEvent;
    private Handler handler;
    private Runnable runnable;

    TextView txt_id, txt_nama, txt_phone, txt_kepala, txt_alamat;
    String id, username, nama, alamat, tanggal, nomer, kepala,lahir;
    SharedPreferences sharedpreferences;

    public static final String TAG_ID = "id";
    public static final String TAG_USERNAME = "username";
    public static final String TAG_NAMA = "nama";
    public static final String TAG_ALAMAT = "alamat";
    public static final String TAG_TANGGAL = "tanggal";
    public static final String TAG_KEPALA = "kepala";
    public static final String TAG_NOMER = "nomer";
    private static final String TAG1 = "Profile";
    private static final String TAG_LAHIR = "lahir";


    @Nullable

    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_profile,container,false);
        txtTimerDay = (TextView) view.findViewById(R.id.txtTimerDay);
        txtTimerHour = (TextView) view.findViewById(R.id.txtTimerHour);
        txtTimerMinute = (TextView) view.findViewById(R.id.txtTimerMinute);
        txtTimerSecond = (TextView) view.findViewById(R.id.txtTimerSecond);
        tvEvent = (TextView) view.findViewById(R.id.tvhappyevent);
        txt_nama = (TextView) view.findViewById(R.id.nama) ;
        txt_phone = (TextView) view.findViewById(R.id.phone);
        txt_kepala = (TextView) view.findViewById(R.id.kepala);
        txt_alamat = (TextView) view.findViewById(R.id.alamat);
        Button btn_logout = (Button) view.findViewById(R.id.btn_logout);

        countDownStart();

        txt_id = (TextView) view.findViewById(R.id.tanggal);


        sharedpreferences = this.getActivity().getSharedPreferences(Login.my_shared_preferences, Context.MODE_PRIVATE);

        id = getActivity().getIntent().getStringExtra(TAG_ID);
        username = getActivity().getIntent().getStringExtra(TAG_USERNAME);
        nama = getActivity().getIntent().getStringExtra(TAG_NAMA);
        alamat = getActivity().getIntent().getStringExtra(TAG_ALAMAT);
        tanggal = getActivity().getIntent().getStringExtra(TAG_TANGGAL);
        nomer = getActivity().getIntent().getStringExtra(TAG_NOMER);
        kepala = getActivity().getIntent().getStringExtra(TAG_KEPALA);
        lahir = getActivity().getIntent().getStringExtra(TAG_LAHIR);

        txt_id.setText(tanggal);
        txt_nama.setText(nama);
        txt_phone.setText(nomer);
        txt_kepala.setText(kepala);
        txt_alamat.setText(alamat);

        btn_logout.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                // update login session ke FALSE dan mengosongkan nilai id dan username
                SharedPreferences.Editor editor = sharedpreferences.edit();
                editor.putBoolean(Login.session_status, false);
                editor.putString(TAG_ID, null);
                editor.putString(TAG_USERNAME, null);
                editor.putString(TAG_ALAMAT, null);
                editor.putString(TAG_TANGGAL, null);
                editor.putString(TAG_LAHIR, null);
                editor.commit();
                Intent intent = new Intent(getActivity(), Login.class);
                startActivity(intent);
            }
        });

        return view;
    }

    public void countDownStart() {
        handler = new Handler();
        runnable = new Runnable() {
            @Override
            public void run() {
                handler.postDelayed(this, 1000);
                try {
                    SimpleDateFormat dateFormat = new SimpleDateFormat(
                            "yyyy-MM-dd");
// Please here set your event date//YYYY-MM-DD
                    Date futureDate = dateFormat.parse(lahir);
                    Date currentDate = Calendar.getInstance().getTime();
                    if (!currentDate.after(futureDate)) {
                        long diff = ((java.util.Date) futureDate).getTime()
                                - ((java.util.Date) currentDate).getTime();
                        long days = diff / (24 * 60 * 60 * 1000);
                        diff -= days * (24 * 60 * 60 * 1000);
                        long hours = diff / (60 * 60 * 1000) ;
                        diff -= hours * (60 * 60 * 1000);
                        long minutes = diff / (60 * 1000);
                        diff -= minutes * (60 * 1000);
                        long seconds = diff / 1000;
                        txtTimerDay.setText("" + String.format("%02d", days));
                        txtTimerHour.setText("" + String.format("%02d", hours));
                        txtTimerMinute.setText(""
                                + String.format("%02d", minutes));
                        txtTimerSecond.setText(""
                                + String.format("%02d", seconds));
                    } else {
                        tvEvent.setVisibility(View.VISIBLE);
                        tvEvent.setText("Congratulations");
                        textViewGone();
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        };
        handler.postDelayed(runnable, 1 * 1000);
    }
    public void textViewGone() {
        getActivity().findViewById(R.id.LinearLayout10).setVisibility(View.GONE);
        getActivity().findViewById(R.id.LinearLayout11).setVisibility(View.GONE);
        getActivity().findViewById(R.id.LinearLayout12).setVisibility(View.GONE);
        getActivity().findViewById(R.id.LinearLayout13).setVisibility(View.GONE);
        getActivity().findViewById(R.id.textView1).setVisibility(View.GONE);
    }
}