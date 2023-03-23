package itstep.learning.servlet;

import com.google.inject.Singleton;
import itstep.learning.data.entity.User;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;

@Singleton
public class UserProfileServlet  extends HttpServlet {


    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
       String profileUserLogin = req.getPathInfo();
       User profileUser = null;
       if(profileUserLogin != null && profileUserLogin.length() > 1){
           profileUserLogin = profileUserLogin.substring(1);//user
           profileUser = userDao


       }


        req.setAttribute("viewName", "profile");
       req.getRequestDispatcher("WEB-INF/_layout.jsp");
    }
}
