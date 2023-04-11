package itstep.learning.course;

import android.content.Context;
import android.view.GestureDetector;
import android.view.MotionEvent;
import android.view.View;

import androidx.annotation.NonNull;

public class OnSwipeTouchListener implements View.OnTouchListener {
    private final GestureDetector gestureDetector;

    public OnSwipeTouchListener(Context context) {
        this.gestureDetector = new GestureDetector(context,null) ;
    }

    @Override
    public boolean onTouch(View view, MotionEvent motionEvent) {
        return gestureDetector.onTouchEvent(motionEvent);
    }
    public void onSwipeRight(){             //методы доступны

    }
    public void onSwipeLeft(){

    }
    public void onSwipeTop(){

    }
    public void onSwipeBottom(){

    }
    private final class GestureListener extends GestureDetector.SimpleOnGestureListener{
        private static final int MIN_DISTANCE = 100; //минимальное расстояние (считается свайпом)
        private static final int MIN_VELOCITY = 100; //минимальное скорость = 100пк/сек
        private static final float COEFFICIENT= 1.5f; //минимальное скорость = 100пк/сек
        //событие касание - не обрабатываем, ждем "протяжки"
        @Override
        public boolean onDown(@NonNull MotionEvent e) {
            return true;
        }
        //событие проведения е1 - точка касания, е2 - отпускания
        @Override
        public boolean onFling(@NonNull MotionEvent e1, @NonNull MotionEvent e2, float velocityX, float velocityY) {
            //алгоритм разбора свайпов: анализируем взаимное расположение точек е1 и е2,
            // а так же устаналиваем минимальный предел скорости, - медленные движение не считаем за свайп
            boolean result = false;
            float deltaX = e2.getX() - e1.getX(); //расстоние между точками
            float deltaY = e2.getY() - e1.getY(); //по горизонтали и вертикали
            if(Math.abs(deltaX) > COEFFICIENT * Math.abs(deltaY)){
                if(Math.abs(deltaX) > MIN_DISTANCE && Math.abs(velocityX) > MIN_VELOCITY){
                    if(deltaX >10){
                        onSwipeRight();
                    }
                    else{
                        onSwipeLeft();
                    }
                    result = true;
                }
            }
            else if(Math.abs(deltaY) > COEFFICIENT * Math.abs(deltaX)){
                if(Math.abs(deltaY) > MIN_DISTANCE && Math.abs(velocityY) > MIN_VELOCITY){
                    if(deltaY > 0){
                        onSwipeBottom();
                    }
                    else{
                        onSwipeTop();
                    }
                    result = true;
                }

            }
            return result;
        }
    }
}
