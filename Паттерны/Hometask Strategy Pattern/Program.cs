using System;

namespace Hometask_Strategy_Pattern
{
    class Program
    {
        static void Main(string[] args)
        {
            //FixedDiscount fd = new FixedDiscount();
            //fd.getDiscountPrice(200);
            //SeasonalDiscount sd = new SeasonalDiscount();
            //sd.getDiscountPrice(200);
            //ScaleDiscount sd = new ScaleDiscount();
            //sd.getDiscountPrice(200);
            PricingManager pm = new PricingManager();
            pm.getPriceWithDiscount();
        }
    }


    interface IDiscountProvader
    {
        double getDiscountPrice(double price);
    }

    class PricingManager
    {
        private double price { get; set; }
        private IDiscountProvader ds;
        private int season;
        //public double Price { get; set; }      

        public double getPriceWithDiscount()
        {
            setDiscountStrategy(ds);
            return price;
        }

        public void setDiscountStrategy(IDiscountProvader ds)
        {
            Console.WriteLine("Select discount: \n 1.Fixed discount \n 2.Scale discount \n 3. Season discount");
            season = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Enter the price: ");
            price = Convert.ToDouble(Console.ReadLine());

            switch (season)
            {
                case 1:
                    FixedDiscount fd = new FixedDiscount();
                    fd.getDiscountPrice(price);
                    break;
                case 2:
                    ScaleDiscount sd = new ScaleDiscount();
                    sd.getDiscountPrice(price);
                    break;
                case 3:
                    SeasonalDiscount season = new SeasonalDiscount();
                    season.getDiscountPrice(price);
                    break;
            }
        }

    }

    class FixedDiscount : IDiscountProvader
    {
        private int discount;
        private double discountAmount;
        public double getDiscountPrice(double price)
        {
            Console.WriteLine("Enter the fixed discount!!!");
            discount = Convert.ToInt32(Console.ReadLine());

            discountAmount = price / 100 * discount;
            discountAmount = price - discountAmount;
            Console.WriteLine($"Price with discount : {discountAmount}");

            //Console.WriteLine(" Enter the new price:");
            //newPrice = Convert.ToDouble(Console.ReadLine());

            //discountPercentage = ((price - newPrice) / price) * 100;
            //Console.WriteLine($"Fixed discount: {discountPercentage}");

            return discountAmount;
        }

    }

    class SeasonalDiscount : IDiscountProvader
    {
        private int season;
        private int discount;
        private double discountAmount;

        public double getDiscountPrice(double price)
        {
            Console.WriteLine("Select the season:\n 1.winter \n 2.spring \n 3.summer \n 4.autumn");
            season = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Enter the discount!!!");
            discount = Convert.ToInt32(Console.ReadLine());

            discountAmount = price / 100 * discount;
            discountAmount = price - discountAmount;

            switch (season)
            {
                case 1:
                    Console.WriteLine($"Winter discount! Discount amount: {discountAmount}");
                    break;
                case 2:
                    Console.WriteLine($"Spring discount! Discount amount: {discountAmount}");
                    break;
                case 3:
                    Console.WriteLine($"Summer discount! Discount amount: {discountAmount}");
                    break;
                case 4:
                    Console.WriteLine($"Autumn discount! Discount amount: {discountAmount}");
                    break;
                default:
                    break;
            }
            return discountAmount;
        }

    }

    class ScaleDiscount : IDiscountProvader
    {
        private double discountAmount;

        private double priceFrame1;
        private double priceFrame2;
        private double priceFrame3;

        private int discount1;
        private int discount2;
        private int discount3;

        public double getDiscountPrice(double price)
        {
            Console.WriteLine("Enter 3 levels of price flames and discount: \n 1 level :\t Price frame:  ");
            priceFrame1 = Convert.ToDouble(Console.ReadLine());
            Console.Write("Discount:  ");
            discount1 = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine(" 2 level \t Price frame:  ");
            priceFrame2 = Convert.ToDouble(Console.ReadLine());
            Console.Write("Discount:  ");
            discount2 = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine(" 3 level \t Price frame:  ");
            priceFrame3 = Convert.ToDouble(Console.ReadLine());
            Console.Write("Discount:  ");
            discount3 = Convert.ToInt32(Console.ReadLine());

            if (price > priceFrame1)
            {
                discountAmount = price / 100 * discount1;
                discountAmount = price - discountAmount;
                Console.WriteLine($"Discounted amount: {discountAmount}");
            }
            else if (price > priceFrame2)
            {
                discountAmount = price / 100 * discount2;
                discountAmount = price - discountAmount;
                Console.WriteLine($"Discounted amount: {discountAmount}");
            }
            else if (price > priceFrame3)
            {
                discountAmount = price / 100 * discount3;
                discountAmount = price - discountAmount;
                Console.WriteLine($"Discounted amount: {discountAmount}");
            }

            return discountAmount;
        }
    }
}
