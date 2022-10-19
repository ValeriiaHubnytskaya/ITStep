namespace Intro.Middleware
{
    public static class SessionAuthExtension 
    {
        public static IApplicationBuilder
            UseMyCustomMiddleware(this IApplicationBuilder builder)
        {
            return builder.UseMiddleware<SessionAuthMiddleware>();
        }
    }
}
