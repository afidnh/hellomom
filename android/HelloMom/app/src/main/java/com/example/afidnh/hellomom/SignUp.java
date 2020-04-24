package com.example.afidnh.hellomom;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

/**
 * Created by Afidnh on 20/02/2019.
 */

public class SignUp extends AppCompatActivity {

    private Button btnLogin,btnSignup;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);
        TextView btn = (TextView) findViewById(R.id.textLogin);
        btn.setOnClickListener(new View.OnClickListener(){

            @Override
            public void onClick(View v){
                Intent i = new Intent(SignUp.this,Login.class);
                startActivity(i);
            }
        });
    }
}
