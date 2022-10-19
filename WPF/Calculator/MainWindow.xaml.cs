using System;
using System.Data;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.IO;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace Calculator
{
    /// <summary>
    /// Логика взаимодействия для MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
         
        }


        private void Button_Click1(object sender, RoutedEventArgs e)
        {
            int increment = int.Parse(number.Text);
            increment++;
            number.Text = increment.ToString();
            number.FontSize++;
        }
        private void Button_Click2(object sender, RoutedEventArgs e)
        {
            int decrement = int.Parse(number.Text);
            decrement--;
            number.Text = decrement.ToString();
            number.FontSize--;
        }

        private void Save(object sender, RoutedEventArgs e)
        {
            using (var writer = new StreamWriter("data.txt", true)) //при добавлении тру, дописывает файл
            {
                writer.WriteLine(number.Text);
                writer.WriteLine(number.FontSize);
            }
        }

        private void Read(object sender, RoutedEventArgs e)
        {
            try
            {
                using (var reader = new StreamReader("data.txt"))
                {
                    number.Text = reader.ReadToEnd();
                    number.FontSize = double.Parse(reader.ReadToEnd());
                }
            }
            catch (IOException ex)
            {
                MessageBox.Show(ex.Message);             
            }
        }
    }
}
