using System;

namespace Class
{
    class Program
    {
        static void Main(string[] args)
        {
            TRex rex = new TRex();
            TRexAdapter adapter = new TRexAdapter(rex);
            BabyTester(adapter);
        }

        public static void BabyTester(IMamual mamual)
        {
            IChild child = mamual.GiveBirth();
            child.cry();
        }
    }

    public interface IChild
    {
        void cry();
    }

    public interface IMamual
    {
        IChild GiveBirth();
    }

    public class TRaxBaby : IChild
    {
        public void cry()
        {
            Console.WriteLine("PPppppp");
        }
    }
  

    public class TRexEgg
    {
        public  IChild Hatch()
        {
            Console.WriteLine("TRexBaby is born!!");
            return new TRaxBaby();
        }
 

    }
   

    public class TRex
    {
        public TRexEgg LayEgg()
        {
            return new TRexEgg();
        }

    }

    public class TRexAdapter : IMamual
    {
        private readonly TRex rex;

        public TRexAdapter(TRex _rex)
        {
            rex = _rex;
        }

        public IChild GiveBirth()
        {
            TRexEgg egg = rex.LayEgg();
            IChild baby = egg.Hatch();
            return baby;
        }
    }
}
