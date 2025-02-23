package vn.edu.dat.Servlet;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/AboutMe")
public class AboutMe extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        response.setCharacterEncoding("utf-8");

        PrintWriter out = response.getWriter();
        out.println("<html><head><title>About Me</title>");
        out.println("<style>");
        out.println("body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }");
        out.println(".container { max-width: 600px; background: white; padding: 20px; margin: auto; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); border-radius: 10px; }");
        out.println("h1 { color: #333; text-align: center; }");
        out.println("p { font-size: 18px; margin: 10px 0; }");
        out.println("strong { color: #555; }");
        out.println("</style>");
        out.println("</head><body>");

        out.println("<div class='container'>");
        out.println("<h1>Thông tin cá nhân</h1>");
        out.println("<p><strong>👤 Họ và tên:</strong> Nguyễn Văn A</p>");
        out.println("<p><strong>📧 Email:</strong> nguyenvana@example.com</p>");
        out.println("<p><strong>📞 Số điện thoại:</strong> 0123 456 789</p>");
        out.println("<p><strong>📍 Địa chỉ:</strong> 123 Đường ABC, TP.HCM</p>");
        out.println("</div>");

        out.println("</body></html>");
    }
}
