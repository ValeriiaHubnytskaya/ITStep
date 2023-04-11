package itstep.learning.course;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        findViewById(R.id.button_calc).setOnClickListener(this::ButtonCalcClick);
        findViewById(R.id.button_game).setOnClickListener(this::ButtonGameClick);
    }


    private void ButtonCalcClick(View view){
    Intent activityIntent = new Intent(MainActivity.this, CalcActivity.class);
    startActivity(activityIntent);
    }
    private void ButtonGameClick(View view){
        Intent activityIntent = new Intent(MainActivity.this, GameActivity.class);
        startActivity(activityIntent);
    }
}