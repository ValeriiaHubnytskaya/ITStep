﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace WpfApp1
{
    /// <summary>
    /// Interaction logic for DnD.xaml
    /// </summary>
    public partial class DnD : Window
    {
       
        private FrameworkElement draggedObject; 
        private FrameworkElement phantomObject;
      
        private Point touchPoint;
        private Point initialPoint;

        public DnD()
        {
            InitializeComponent();
            //isDragged = false;
            draggedObject = null;
            phantomObject = null;
        }

        private void Mouse_Up(object sender, MouseButtonEventArgs e)
        {
            if (draggedObject != null)
            {
                switch (e.ChangedButton)
                {
                    case MouseButton.Left:
                        if (Canvas.GetLeft(draggedObject) < 400 || Canvas.GetTop(draggedObject) < 50 || Canvas.GetLeft(draggedObject) > 600)
                        {
                            Canvas.SetLeft(draggedObject, initialPoint.X);
                            Canvas.SetTop(draggedObject, initialPoint.Y);
                        }
                        draggedObject = null;
                        Field.ReleaseMouseCapture();
                        break;
                }
            }
            if (phantomObject != null)
            {
                switch (e.ChangedButton)
                {
                    case MouseButton.Left:
                        if (Canvas.GetLeft(phantomObject) < 400 || Canvas.GetTop(phantomObject) < 50 || Canvas.GetLeft(phantomObject) > 600)
                        {
                            Canvas.SetLeft(phantomObject, initialPoint.X);
                            Canvas.SetTop(phantomObject, initialPoint.Y);
                        }
                        phantomObject = null;
                        Field.ReleaseMouseCapture();
                        break;
                }
                Field.Children.Remove(phantomObject);
               //phantomObject = null;
            }
        }
        private void Mouse_Move(object sender, MouseEventArgs e)
        {
            if (draggedObject != null)
            {
               Canvas.SetLeft(draggedObject, 
                   e.GetPosition(Field).X - draggedObject.Width /2 - touchPoint.X);

                Canvas.SetTop(draggedObject, 
                    e.GetPosition(Field).Y - draggedObject.Height / 2 - touchPoint.Y);
            }

            /* Phantom*/
            if (phantomObject != null)
            {
                Canvas.SetLeft(phantomObject,
                    e.GetPosition(Field).X  - touchPoint.X);

                Canvas.SetTop(phantomObject,
                    e.GetPosition(Field).Y - touchPoint.Y);

            }
        }
        private void Subj_MouseDown(object sender, MouseButtonEventArgs e) //событие нажатие мыши
        {
            switch (e.ChangedButton)
            {
                case MouseButton.Left:
                    //   isDragged = true;
                    draggedObject = sender as FrameworkElement; //тот кто посылает это событие, 
                    //обозначается как сендер
                    if (draggedObject == null) return;

                    touchPoint = e.GetPosition(draggedObject);
                    initialPoint.X = Canvas.GetLeft(draggedObject);
                    initialPoint.Y = Canvas.GetTop(draggedObject);

                    Field.CaptureMouse(); //захват - события
                    //будут попадать в это окно, даже если курсор из него выйдет
                    break;
                case MouseButton.Middle:
                    break;
                case MouseButton.Right:
                    break;
                case MouseButton.XButton1:
                    break;
                case MouseButton.XButton2:
                    break;
            }
        }

        private void Ellipse_MouseDown(object sender, MouseButtonEventArgs e)
        {
            //Вариация с фантомными объектом
            Ellipse proto = sender as Ellipse;
            phantomObject = new Ellipse
            {
                Width = proto.Width,
                Height = proto.Height,
                Stroke = Brushes.Tomato
            };
            Field.Children.Add(phantomObject);
            Canvas.SetLeft(phantomObject, Canvas.GetLeft(proto)); 
            Canvas.SetTop(phantomObject, Canvas.GetTop(proto));
            touchPoint = e.GetPosition(proto);
            initialPoint.X = Canvas.GetLeft(phantomObject);
            initialPoint.Y = Canvas.GetTop(phantomObject);
        }
    }
}
/*
 * DnD
 * Технология визуального интерфейса, связывания с "перетаскиванием"
 * объектов мышью
 * Для реализации необходимо:
 * -по событию - нажатию - перейти в режим перетаскивания.
 * - по событию движению - менять позиции объекта
 * - по событие отжатия - зафиксировать новую позицию
 * 
 * Вариации:
 * "Фантомы" - копия объектов, перетягиваемые вместо оригиналов
 * "контейнеры" - если не попадаем в контейнер, перетягивание отменяется
 * 
 * Особеннсти:
 * - событие нажатия получает сам объект, тогда движение и отжатие - све окно.
 * Иначе при резких движениях курсор уходит с объекта и он теряет событие.
 * для перетягивания за точку "взятия " необходимо запоминать координаты этой точки в событии
 * нажатия, а корректировать в событии движения мыши.
 *  - похожая на 1.п ситуация возможна с окном: при выходе
 *  указателя мыши из окна "теряется" событие отжатия кнопки
 *  Решается захватом указателя на время нажатия
 * 

 
 */ 
