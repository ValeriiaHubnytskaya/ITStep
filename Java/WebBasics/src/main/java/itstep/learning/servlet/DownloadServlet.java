package itstep.learning.servlet;

import com.google.inject.Inject;
import com.google.inject.Singleton;
import com.google.inject.name.Named;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.nio.file.Files;

@Singleton
public class DownloadServlet extends HttpServlet {
    @Inject @Named("AvatarFolder")
    private String avatarFolder;
    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String path = req.getServletContext().getRealPath( "/" ) + avatarFolder ; //из upload(RegUser)
        File file = new File( path, req.getPathInfo());
        if( file.isFile() && file.canRead()){
            String mimeType = Files.probeContentType(file.toPath());
            //System.out.println(mimeType);

            //resp.setContentType("application/octet-stream");
            //resp.setHeader("Content-Disposition", "attachment; filename=\"download.jpg\"");
            if( ! mimeType.startsWith("image",2)){
                resp.setStatus(415);
                resp.getWriter().print("Unsupported Media Type: " + mimeType);
                return;
            }
            resp.setContentType(mimeType);
            //piping =
            byte[] buf = new byte[1024];
           try( InputStream reader = Files.newInputStream(file.toPath())){
               OutputStream writer = resp.getOutputStream();
               int len;
               while( ( len = reader.read( buf ) ) != -1 ){
                   writer.write( buf,0, len);
               }
            }
           catch(IOException ex) {
               resp.setStatus( 500 );
               System.err.println( "DownloadServlet: " + ex.getMessage() );
           }


        }

    }
}
