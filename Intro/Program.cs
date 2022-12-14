using Intro.Services;
using Microsoft.EntityFrameworkCore;
using System;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
builder.Services.AddDbContext<Intro.DAL.Context.IntroContext>
    (options => options.UseSqlServer(
        builder.Configuration.GetConnectionString("introDb")));
builder.Services.AddControllersWithViews();
builder.Services.AddSingleton<RandomService>();
builder.Services.AddSingleton<IHasher, ShaHasher>();
builder.Services.AddScoped<IAuthService, SessionAuthService>();
#region Session
builder.Services.AddDistributedMemoryCache();

builder.Services.AddSession(options =>
{
    options.IdleTimeout = TimeSpan.FromHours(24);
    options.Cookie.HttpOnly = true;
    options.Cookie.IsEssential = true;
});
#endregion

var app = builder.Build();

// Configure the HTTP request pipeline.
if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Home/Error");
}
app.UseStaticFiles();

app.UseRouting();

app.UseAuthorization();
app.UseSession();
app.UseMiddleware<Intro.Middleware.SessionAuthMiddleware>();

app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Home}/{action=Index}/{id?}");

app.Run();
