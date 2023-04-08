package itstep.learning.course;

import androidx.appcompat.app.AppCompatActivity;

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
    }

    private void buttonClick(View view){
        TextView textHello = findViewById(R.id.text_hello);
        String txt = textHello.getText().toString();
        txt += "!";
        textHello.setText(txt);
    }

    private void buttonDel(View view){

        TextView textHello = findViewById(R.id.text_hello);
        String txt = textHello.getText().toString();
        txt.substring(0, txt.length()-1);

        textHello.setText(txt);
    }
    private void ButtonCalcClick(View view){
    Intent activityIntent = new Intent(MainActivity.this, CalcActivity.class);
    startActivity(activityIntent);
    }
}