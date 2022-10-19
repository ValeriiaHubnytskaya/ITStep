using System;
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
    /// Interaction logic for DT.xaml
    /// </summary>
    public partial class DT : Window
    {
        public DT()
        {
            InitializeComponent();
        }

        private void DoneButton_Click(object sender, RoutedEventArgs e)
        {
            DateTime dateTime = DTpicker.SelectedDate.Value;
            DTtext.Text = " To String: " + dateTime.ToString()
                + "\n To Binary: " + dateTime.ToBinary()
                + "\n To Local Time: " + dateTime.ToLocalTime()
                + "\n To Long Date String: " + dateTime.ToLongDateString()
                + "\n To Long Time String: " + dateTime.ToLongTimeString()
                + "\n To Short Date String:" + dateTime.ToShortDateString()
                + "\n To Short Time String:" + dateTime.ToShortTimeString()
                + "\n To Universal Time" + dateTime.ToUniversalTime();
            String iso8601 = String.Format(
                "{0}-{1}-{2} {3}:{4}:{5}.{6}",
                dateTime.Year,
               (dateTime.Month < 10 ? "0" : "") + dateTime.Month,
                (dateTime.Day < 10 ? "0" : "") + dateTime.Day,
               (dateTime.Hour < 10 ? "0" : "") + dateTime.Hour,
               (dateTime.Minute < 10 ? "0" : "") + dateTime.Minute,
                (dateTime.Second < 10 ? "0" : "") + dateTime.Second,
                (dateTime.Millisecond < 10 ? "0" : "") + dateTime.Millisecond
                );
            String rfc2822 = String.Format(
                "{0}, {1} {2} {3} {4}:{5}:{6}",
                dateTime.DayOfWeek,
                  (dateTime.Day < 10 ? "0" : "") + dateTime.Day,
                  (dateTime.Month < 10 ? "0" : "") + dateTime.Month,
                  dateTime.Year,
                (dateTime.Hour < 10 ? "0" : "") + dateTime.Hour,
               (dateTime.Minute < 10 ? "0" : "") + dateTime.Minute,
                (dateTime.Second < 10 ? "0" : "") + dateTime.Second
                );
            String rfc3339 = String.Format("{0}-{1}-{2}T{3}:{4}:{5}",
                dateTime.Year,
                (dateTime.Month < 10 ? "0" : "") + dateTime.Month,
                (dateTime.Day < 10 ? "0" : "") + dateTime.Day,
               (dateTime.Hour < 10 ? "0" : "") + dateTime.Hour,
               (dateTime.Minute < 10 ? "0" : "") + dateTime.Minute,
                (dateTime.Second < 10 ? "0" : "") + dateTime.Second
            );
            DTtext.Text += "\nISO - 8601: " + iso8601;
            DTtext.Text += "\n RFC - 2822: " + rfc2822;
            DTtext.Text += "\n RFC - 3339: " + rfc3339;
            //try
            //{
            //    DTtext.Text = " To String: " + DTcalendar.SelectedDate.Value.ToString()
            //        + " \nNow: " + DateTime.Now.ToString();
            //}
            //catch
            //{
            //    DTtext.Text = " Selected Date ";
            //}
        }

        private void parseDate_Click(object sender, RoutedEventArgs e)
        {
            String dtStr = tbDate.Text;
            try {
            var dt = DateTime.Parse(dtStr);
            DTtext.Text = dt.ToString();
         }
            catch
            {
                DTtext.Text = "--";
            }
            try
            {
              DTtext.Text += "\n" +  Convert.ToDateTime(dtStr); 
            }
            catch
            {
                DTtext.Text = "--";
            }           
        }
    }
}
/*
 Дата / время
Есть множество форматов представления даты / времени:
- SQL
- Email
- Internet
- + локализация (национальные стандарты)
    Наиблее общие представление даты/времени в программировании - 
    TIMESTAMP - количество секунд или миллисекунды, прошедших с определенного момента 
    (старт первой Unix - машины)
    Метка даты без времени , при сравнение это популярная ошибка, из-за того, что метка больше  в самом начале
 */
