namespace Intro.Middleware
{
    public class SessionAuthMiddleware
    {
       // обязательное поле для Middleware
        private readonly RequestDelegate next; //ссылка на следующий слой

        //обязательная форма конструктора
        public SessionAuthMiddleware(RequestDelegate next)
        {
            this.next = next;
        }

        //обязательный метод класса

        public async Task InvokeAsync(HttpContext context)
        {
            context.Items.Add("Hello");
            await next(context);
        }
    }
}
