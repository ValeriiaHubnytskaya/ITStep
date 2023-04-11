package itstep.learning.course;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Context;
import android.os.Build;
import android.os.Bundle;
import android.os.VibrationEffect;
import android.os.Vibrator;
import android.os.VibratorManager;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import java.text.DecimalFormat;

import kotlin.Suppress;

public class CalcActivity extends AppCompatActivity {
    private TextView tvHistory;
    private TextView tvResult;
    private String comma;
    private String minusSign;
    private String zeroSymbol;
    private String plusSymbol;
    private String minusSymbol;
    private String mulSymbol;
    private String divSymbol;
    private boolean needClear; //необходимость очистить экран

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_calc);

        minusSign = getString(R.string.calc_minus_sign);
        zeroSymbol = getString(R.string.calc_btn_0_text);
        comma = getString(R.string.calc_comma);
        plusSymbol = getString(R.string.calc_btn_plus_text);
        minusSymbol = getString(R.string.calc_btn_minus_text);
        mulSymbol = getString(R.string.calc_btn_multiplication_text);
        divSymbol = getString(R.string.calc_btn_divide_text);

        tvHistory = findViewById(R.id.tv_history);
        tvResult = findViewById(R.id.tv_result);

        tvHistory.setText("");
        displayResult("");

        // String[] suffixes = {"one", "two", } ;
        for (int i = 0; i < 10; i++) {
            @SuppressLint("DiscouragedApi")   // более эффективно - R.id.calc_btn_5
            int buttonId = getResources().getIdentifier(
                    "calc_btn_" + i,    // suffixes[i],
                    "id",
                    getPackageName()
            );
            findViewById(buttonId).setOnClickListener(this::digitClick);
        }
        findViewById(R.id.calc_btn_backspace).setOnClickListener(this::backspaceClick);
        findViewById(R.id.calc_btn_plus_minus).setOnClickListener(this::plusMinusClick);
        findViewById(R.id.calc_btn_clear).setOnClickListener(this::clearClick);
        findViewById(R.id.calc_btn_ce).setOnClickListener(this::clearEditClear);
        findViewById(R.id.calc_btn_square).setOnClickListener(this::squareClick);
        findViewById(R.id.calc_btn_comma).setOnClickListener(this::commaClick);
        findViewById(R.id.calc_btn_inverse).setOnClickListener(this::inverseClick);
        findViewById(R.id.calc_btn_sqrt).setOnClickListener(this::sqrtClick);

       // findViewById(R.id.calc_btn_percent).setOnClickListener(this::percentClick);

        findViewById(R.id.calc_btn_plus).setOnClickListener(this::operatorClick);
        findViewById(R.id.calc_btn_minus).setOnClickListener(this::operatorClick);
        findViewById(R.id.calc_btn_multiply).setOnClickListener(this::operatorClick);
        findViewById(R.id.calc_btn_divide).setOnClickListener(this::operatorClick);
//        findViewById(R.id.calc_btn_equal).setOnClickListener(this::equalClick);

    }
    //При измененние конфигурации устройства, перезапускается активность и данные исчезают




    @Override
    protected void onSaveInstanceState(@Nullable Bundle savingState) {
        super.onSaveInstanceState(savingState);
        Log.d("CalcActivity", "onSaveInstanceState");
        //добавляем к сохранеямым данным свои значения
        savingState.putCharSequence("history", tvHistory.getText());
        savingState.putCharSequence("result", tvResult.getText());
    }
    // Вызов при восстановлении конфигурации
    @Override
    protected void onRestoreInstanceState(@NonNull Bundle savedState) {
        super.onRestoreInstanceState(savedState);
        Log.d("CalcActivity", "onRestoreInstanceState");
        tvHistory.setText(savedState.getCharSequence("history"));
        tvResult.setText(savedState.getCharSequence("result"));
    }
    private void operatorClick(View view){
        String result = tvResult.getText().toString();
        double arg;
        try {
            arg = Double.parseDouble(
                    result
                            .replace(minusSign, "-")
                            .replaceAll(zeroSymbol, "0")
                            .replace(comma, ".")
            );
        }
        catch (NumberFormatException | NullPointerException ignored) {
            Toast.makeText(
                            this,
                            R.string.calc_error_parse,
                            Toast.LENGTH_SHORT)
                    .show();
            return;
        }
        switch (view.getId()) {
            case R.id.calc_btn_plus:
                tvHistory.setText(arg + " + " + result);
                arg += arg;
                displayResult(arg);
                needClear = true;
                break;
            case R.id.calc_btn_minus:
                tvHistory.setText(arg + " - " + result);
                arg -= arg;
                displayResult(arg);
                needClear = true;
                break;
            case R.id.calc_btn_multiply:
                tvHistory.setText(arg + " * " + result);
                arg *= arg;
                displayResult(arg);
                needClear = true;
                break;
            case R.id.calc_btn_divide:
                tvHistory.setText(arg + " / " + result);
                arg /= arg;
                displayResult(arg);
                needClear = true;
                break;
        }
        tvHistory.setText("1/" + result + " =");
        arg = 1 / arg;
        displayResult(arg);
        needClear = true;
    }


    private void sqrtClick(View view) {
        String result = tvResult.getText().toString();
        double arg;
        try {
            arg = Double.parseDouble(result
                    .replace(minusSign, "-")
                    .replaceAll(zeroSymbol, "0")
                    .replace(comma, ",")
            );
        }
        catch (NumberFormatException | NullPointerException ignore) {
            Toast.makeText(this,
                    R.string.calc_error_parse,
                    Toast.LENGTH_SHORT).show();
            return;
        }
        if( arg < 0 ) {
            // Корень из отрицательного числа не извлекается (в действительных числах)
            /* Доступ к системным устройствам на примере вибрации
            Прежде всего, нужно получить разрешение на использование устройства.
            Некоторые устройства не требуют подтверждение от пользователя, но все они
            должны запросить разрешение от системы.
            Заявка на доступ к устройствам (и другие разрешения) указываются в манифесте
            <uses-permission android:name="android.permission.VIBRATE"/>
            Дальнейшая работа с устройством может зависеть от версии API на которую рассчитано
            приложение.
            */
            /* Самый простой подход - deprecated from O (Oreo, API 26)
            Vibrator vibrator = (Vibrator) getSystemService( Context.VIBRATOR_SERVICE ) ;
            vibrator.vibrate( 250 ) ; // вибрация 250 мс
            */
            // начиная с S (API 31) изменились правила доступа к устройствам
            Vibrator vibrator ;
            if( Build.VERSION.SDK_INT >= Build.VERSION_CODES.S ) {
                VibratorManager vibratorManager = (VibratorManager)
                        getSystemService( Context.VIBRATOR_MANAGER_SERVICE ) ;
                vibrator = vibratorManager.getDefaultVibrator() ;
            }
            else {
                vibrator = (Vibrator) getSystemService( Context.VIBRATOR_SERVICE ) ;
            }

                // шаблон вибрации 1 - пауза, 2 - работа, 3 - пауза, 4 - работа, .....
            long[] vibratePattern = { 0, 200, 100, 200 } ;

            if( Build.VERSION.SDK_INT >= Build.VERSION_CODES.O ) {
            // однократное включение
            // vibrator.vibrate( VibrationEffect.createOneShot( 250, VibrationEffect.DEFAULT_AMPLITUDE ) ) ;

                vibrator.vibrate(
                        VibrationEffect.createWaveform(
                                vibratePattern, -1 // индекс повтора, -1 - без повторов, один раз
                        )
                ) ;
            }
            else {
                //vibrator.vibrate( 250 ) ; // вибрация 250 мс
                vibrator.vibrate(vibratePattern, -1);
            }

        }
    }



    private void commaClick(View view) {
        String result = tvResult.getText().toString();
        if (result.length() >= 10 || result.contains(comma)) {
            return;
        }
        result += comma;
        displayResult(result);
    }
    private void inverseClick(View view){
        String result = tvResult.getText().toString();
        double arg;
        try {
            arg = Double.parseDouble(
                    result
                            .replace(minusSign, "-")
                            .replaceAll(zeroSymbol, "0")
                            .replace(comma, ".")
            );
        }
        catch (NumberFormatException | NullPointerException ignored) {
            Toast.makeText(
                            this,
                            R.string.calc_error_parse,
                            Toast.LENGTH_SHORT)
                    .show();
            return;
        }
        tvHistory.setText("1/" + result + " =");
        arg = 1 / arg;
        displayResult(arg);
        needClear = true;
    }
    private void squareClick(View view) {
        String result = tvResult.getText().toString();
        double arg;
        try {
            arg = Double.parseDouble(result
                    .replace(minusSign, "-")
                    .replaceAll(zeroSymbol, "0")
                    .replace(comma, ",")
            );
        } catch (NumberFormatException | NullPointerException ignore) {
            Toast.makeText(this,
                    R.string.calc_error_parse,
                    Toast.LENGTH_SHORT).show();
            return;
        }
        tvHistory.setText(getString( R.string.calc_square_history, result));
        arg *= arg;
        displayResult(arg);
        needClear = true;
    }

    private void clearClick(View view) {
        tvHistory.setText("");
        displayResult("");
    }

    private void clearEditClear(View view) {
        displayResult("");
    }

    private void plusMinusClick(View view) {
        // изменение знака: если есть "-" перед числом, то убираем его, если нет - добавляем
        String result = tvResult.getText().toString();
        if (result.equals(zeroSymbol)) {
            return;   // перед "0" знак не ставить
        }
        if (result.startsWith(minusSign)) {
            result = result.substring(1);
        } else {
            result = minusSign + result;
        }
        displayResult(result);
    }

    private void backspaceClick(View view) {
        String result = tvResult.getText().toString();
        result = result.substring(0, result.length() - 1);
        displayResult(result);
    }

    private void digitClick(View view) {
        String result = tvResult.getText().toString();
        if (result.length() >= 10) {
            return;
        }
        String digit = ((Button) view).getText().toString();
        if (result.equals(zeroSymbol) || needClear) {
            result = "";
            needClear = false;
        }
        result += digit;
        displayResult(result);

    }

    private void displayResult(String result) {
        if ("".equals(result) || minusSign.equals(result)) {
            result = zeroSymbol;
        }

        result = result
                .replace("-", minusSign)
                .replaceAll("0", zeroSymbol);
        tvResult.setText(result);
    }

    private void displayResult(double arg) {
        long argInt = (long) arg;
        String result = "" + (argInt == arg ? argInt : arg);

        result = result
                .replace("-", minusSign)
                .replaceAll("0", zeroSymbol)
                .replace(",", comma);
        displayResult(result);
    }

}