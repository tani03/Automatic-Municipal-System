/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author user
 */
public class submitComplain extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            String username = request.getParameter("fname");
			int houseno  = Integer.parseInt(request.getParameter("hnumber"));
			String useradd= request.getParameter("address");
			int ward      = Integer.parseInt(request.getParameter("word"));
			long usercon  = Long.parseLong(request.getParameter("phone"));
			String depart = request.getParameter("dep");
			String com    = request.getParameter("cmp");
                        int diff=2;
                        if(com.equals("not properly supplied/light disturbed"))
			{
				diff=3;
			}
                        else if(com.equals("supply line or flow  disturb"))
                        {
                            diff=2;
                        }
			else
                        {
                            diff=1;
                        }
                        
                       connect c=new connect();
                       Statement st=c.getStatement();
                       st.executeUpdate("INSERT into user (name,house_number,address,word_number,phone,department,complain_details, wrk_level) values ('"+username+"',"+houseno+",'"+useradd+"',"+ward+","+usercon+",'"+depart+"','"+com+"',"+diff+")");
                     out.println("<h1><center><BLOCKQUOTE><b><marquee><font size=\"100\" color=\"forest-green\"> Welcome to Complain Zone</font></marquee></b><BLOCKQUOTE></center></h1>\n" +
"	<font color=\"teal\"  face=\"arial\"><h3><a href=\"#\">About </a>&nbsp;<a href=\"http://localhost/mytest/mtmlmunici%20(1).html\">Home </a>\n" +
"	<center><h3>All fields are required</h3></center><center>Everything is fine");
                    
                     out.println("Data is inserted");
                      response.sendRedirect("http://localhost/mytest/sms.php");
                     Check ch=new Check();
                     
                     out.println("<br>This is executing<br>");
                    
                   //  Map<String, String> result = ch.show_msg();
                   //  out.println(result);
                     response.sendRedirect("http://localhost/mytest/sms.php");
        } catch (SQLException ex) {
            Logger.getLogger(submitComplain.class.getName()).log(Level.SEVERE, null, ex);
        } catch (Exception ex) {
            Logger.getLogger(submitComplain.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
