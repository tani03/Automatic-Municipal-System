
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author user
 */
public class connect {
    protected Connection con;
    protected Statement st,st1;
    protected ResultSet rs,rs1;
   connect()
   {
       try{
           Class.forName("com.mysql.jdbc.Driver");
           con=DriverManager.getConnection("jdbc:mysql://localhost:3306/municipality", "root", "");
           System.out.println("connection done");
           st=con.createStatement();
           st1=con.createStatement();
           
       }catch(Exception e)
       {
           System.out.println("Error Occured");
       }
   }
   public Statement getStatement()
   {
       return st;
   }
    
}
