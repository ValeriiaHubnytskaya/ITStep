using System;
using System.Collections.Generic;
using System.Net;

interface ICommand
{
    void Execute(Mario m);
    void Undo(Mario m);
}

class Mario
{
    public void Left()
    {
        Console.WriteLine("Moving left");
    }
    public void Right()
    {
        Console.WriteLine("Moving right");
    }
    public void Jump()
    {
        Console.WriteLine("Moving up");
    }
}

class RightCommand : ICommand
{
    public void Execute(Mario m)
    {
        m.Right();
    }
    public void Undo(Mario m)
    {
        m.Left();
    }
}

class LeftCommand : ICommand
{
    public void Execute(Mario m)
    {
        m.Left();
    }
    public void Undo(Mario m)
    {
        m.Right();
    }
}

class JumpCommand : ICommand
{
    public void Execute(Mario m)
    {
        m.Jump();
    }
    public void Undo(Mario m)
    {

    }
}

namespace ConsoleApp1
{
    class InputHandler
    {
        ICommand LeftButton;
        ICommand RightButton;
        ICommand UpButton;

        public InputHandler()
        {
            LeftButton = new LeftCommand();
            RightButton = new RightCommand();
            UpButton = new JumpCommand();
        }

        public void HandeInput(Mario mario, string Command)
        {
            if (Command == "left")
            {
                LeftButton.Execute(mario);
            }
            if (Command == "right")
            {
                RightButton.Execute(mario);
            }
            if (Command == "jump")
            {
                UpButton.Execute(mario);
            }
        }
    }

    class Program
    {
        static void Main(string[] args)
        {
            Mario mario = new Mario();
            InputHandler ih = new InputHandler();

            List<ICommand> script = new List<ICommand>();
            script.Add(new LeftCommand());
            script.Add(new RightCommand());
            script.Add(new JumpCommand());
            script.Add(new LeftCommand());
            foreach (var command in script)
            {
                command.Execute(mario);
            }
            Console.WriteLine("Script finished!!!!!!!!");

            Console.WriteLine("Running undo script");
            foreach (var command in script)
            {
                command.Execute(mario);
            }
            Console.WriteLine("Undo script finished");

            string Command = " ";
            while (Command != "quit")
            {

                Console.WriteLine("Enter command: ");

                Command = Console.ReadLine();

                ih.HandeInput(mario, Command);
            }
            

        }
    }

}
