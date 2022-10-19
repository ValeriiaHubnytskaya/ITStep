using System;

namespace Fasad
{
    class Program
    {
        class SmartHome
        {
            Light l = new Light();
            Thermostat t = new Thermostat();
            HomeTeatre h = new HomeTeatre();

            //Light l;
            //Thermostat t;
            //HomeTeatre h;

            public void ComeHome()
            {
                l.On();
                t.HeatOn();
                h.On();
            }

            public void ComeWork()
            {
                l.Off();
                t.HeatOff();
                h.Off();
            }
        }

        class Light
        {
            public void On()
            {
                Console.WriteLine("Light on");
            }
            public void Off()
            {
                Console.WriteLine("Light off");
            }
        }

        class Thermostat
        {
            private int temperature;

            public void SetTemp()
            {
                Console.WriteLine("Enter the temperature: ");
                temperature = Convert.ToInt32(Console.ReadLine());
                Console.WriteLine($"Temperature: {temperature}");
            }

            public void HeatOn()
            {
                SetTemp();
                Console.WriteLine("Temp On");
            }

            public void HeatOff()
            {
                SetTemp();
                Console.WriteLine("Temp off");
            }
        }

        class HomeTeatre
        {
            private int volume;
            
            public void SetVolume()
            {
                Console.WriteLine("Set the volume:");
                volume = Convert.ToInt32(Console.ReadLine());
                Console.WriteLine($"Volume: {volume}");
            }

            public void On()
            {
                SetVolume();
                Console.WriteLine("On");
            }
            public void Off()
            {
                volume = 0;
                Console.WriteLine("Off");
            }
        }
        static void Main()
        {
            SmartHome sh = new SmartHome();

            int choice;
            Console.WriteLine("Make a choice: \n 1.Come Home \n 2.Come Work \n");
            choice = Convert.ToInt32(Console.ReadLine());
          
            switch (choice)
            {
                case 1:
                    sh.ComeHome();
                    break;
                case 2:
                    sh.ComeWork();
                    break;
            }

        }
    }
}
