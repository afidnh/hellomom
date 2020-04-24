package com.example.afidnh.hellomom;


import android.content.SharedPreferences;
import android.os.Handler;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    private TextView txtTimerDay, txtTimerHour, txtTimerMinute, txtTimerSecond;
    private TextView tvEvent;
    private Handler handler;
    private Runnable runnable;

    TextView txt_id, txt_username, txt_password, txt_email, txt_phone;
    String id, username, nama, alamat, tanggal;
    SharedPreferences sharedpreferences;

    public static final String TAG_ID = "id";
    public static final String TAG_USERNAME = "username";
    public static final String TAG_NAMA = "nama";
    public static final String TAG_ALAMAT = "alamat";
    public static final String TAG_TANGGAL = "tanggal";

    private static final String TAG1 = "MainActivity";

    private SectionsPageAdapter mSectionsPageAdapter;

    private ViewPager mViewPager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Log.d(TAG1, "onCreate: Starting.");

        mSectionsPageAdapter = new SectionsPageAdapter(getSupportFragmentManager());

        // Set up the ViewPager with the sections adapter.
        mViewPager = (ViewPager) findViewById(R.id.container);
        setupViewPager(mViewPager);

        TabLayout tabLayout = (TabLayout) findViewById(R.id.tabs);
        tabLayout.setupWithViewPager(mViewPager);
    }

    private void setupViewPager(ViewPager viewPager) {
        SectionsPageAdapter adapter = new SectionsPageAdapter(getSupportFragmentManager());
        adapter.addFragment(new Home(), "Home");
//        adapter.addFragment(new Berita(), "Berita");
        adapter.addFragment(new Profile(), "Profile");
        viewPager.setAdapter(adapter);
    }


}
