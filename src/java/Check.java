import java.sql.*;
import java.util.*;
public class Check extends connect//if complain is submitted then this process will be automatically done,i.e,this class will execute automatically
{//as it extends connect constuctor of super class will be executed automatically
    String dep;//check which department after submission
    int comp_id,level;
    Check()throws Exception
    {
        
        st1=con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,ResultSet.CONCUR_READ_ONLY);
        rs1=st1.executeQuery("select * from user");
        rs=st.executeQuery("select * from resp");
        while(rs1.next())//for checking the complains of the user
        {
            dep=rs1.getString("department");
            comp_id=rs1.getInt("complain_ld");
            level=rs1.getInt("wrk_level");
            System.out.println(comp_id+" "+level);
          //  rs=st.executeQuery("select * from resp");
           // System.out.println(rs.last());
            if(!rs.next())
            {
                System.out.println("checking not empty");
                rs1=available();
                
            }
            else if(rs.isAfterLast())
            {
              System.out.println("checking last or not");
               // rs1.next();
                rs1=available();
            }
        }
    }
    ResultSet available()throws Exception
    {
       // insertdata_for_compSoln();
     Scanner sc= new Scanner(System.in);
     
       solv_drain();//call solv drain method to execute the method of checking the availabilty of worker
     
     
     return rs1;
    }
   void solv_drain()throws Exception//method for dep_drain only
   {
       
       System.out.println("In method");
            try
            {
            String query="select * from "+dep+";";//##
            rs= st.executeQuery(query);
             if(level==1)//for critical condition
                experience(1);
             else if(level==2)
                experience(2);
             else
           {
             int flag=1;
            while(rs.next())
            {
                
               
                int emp= rs.getInt("emp_id");
                String avail= rs.getString("free");
                int no_wrks=rs.getInt("no_of_works");
                System.out.println(emp);//
                System.out.println(avail);//
                if(avail.equals("Y"))
                {
                    System.out.println("checking yes or no");//
                    avail="N";//chnging value Y to N as wrkr wont b free after assigning wrk to it
                    String q;
                    q = "update "+dep+" set free='"+avail+"' where emp_id ="+emp+"";
                    st.executeUpdate(q);//updating the existing table by chnging Y to N in free colmn
                    allot(emp,no_wrks);
                    flag=0;
                    break;//exit if free employee found
                }
                
            }
            
            if(flag==1)//***adding features of experiences
                {
                    
                    solve_by_work_load(0);
                }
            }
           }
            catch(Exception e)
            {
                System.out.println("Exception:"+e);
            }
   }
   void allot(int emp,int nw)//for storing the data of the alloted workers and add accordingly the no of works
   {
       try{
           String p;
       nw++;
       p = "update "+dep+" set no_of_works="+nw+" where emp_id ="+emp+"";
                    st.executeUpdate(p);//to update the no. of wrks given to the wrkr
                    store_in_soln(emp);
                    store_in_resp(emp);
                   // show_msg();
       }
       catch(Exception e)
       {
           System.out.println("Exception is:"+e);
       }
   }
   public void solve_by_work_load(int furthr)//furthr=0 as for proceedng with no_f_wrks_given,=1 for experience)throws Exception//first w will allot the work according to the works already alloted for the workers
   {
        try{
            ResultSet r;
     if(furthr!=2){
         r=st.executeQuery("select * from "+dep+";");
      if(furthr==0) //when all are 'Y' to 'N'    
        r=st.executeQuery("select count(distinct work_completed_in_month) AS cDCnt from "+dep+";");
      else if(furthr==1)//when everyone has same wrk_cpmltd_in_mnth
        r=st.executeQuery("select count(distinct no_of_works) AS cDCnt from "+dep+";");
      
        r.next();
        int c=r.getInt("cDCnt");//to count the no. of distinct values where if returns 1 then all the values are same
        System.out.println("the no. of distinct value is"+c);
        if(c!=1)//if everyone has different no._of_works present/completed/experience in month
        {
            ResultSet rst,rstbk;
            String q;
                if(furthr==0)
                   q="select count(distinct work_completed_in_month) AS cDCnt from (select * from "+dep+" where work_completed_in_month=(select min(work_completed_in_month) from "+dep+")) AS Min";
                 else
                   q="select count(distinct no_of_works) AS cDCnt from (select * from dep_drain where no_of_works=(select min(no_of_works) from "+dep+"))AS Min";//selecting the row which employee has minimum no. of works alloted
            rst=st.executeQuery(q);
            
            rst.next();
            int cnt=rst.getInt("cDCnt");//;
            
            
                
            System.out.println("The distinct valur in"+furthr+" is "+cnt);
   
           
            if(cnt==1){
                 if(furthr==0)
                rst=st.executeQuery("select * from "+dep+" where work_completed_in_month=(select min(work_completed_in_month) from "+dep+")");
                else
                rst=st.executeQuery("select * from "+dep+" where no_of_works=(select min(no_of_works) from "+dep+")");
               
                rstbk=rst;
                
               
                
            int count=0;
            while(rstbk.next())
            {
                count++;
            }
            System.out.println("count is"+count);
            if(count>1)
            {
                if(furthr==0)
                solve_by_work_load(1);
                else
                solve_by_work_load(2);
                
                    
            }
            else
            {
               
              System.out.println("cheching that whether only one minimum value is present or not");
              rst.previous();
            int nw=rst.getInt("no_of_works");
            int emp=rst.getInt("emp_id");
            allot(emp,nw);
            }
            }
            else{
                System.out.println("checking that whether more than one minimum value is present or not");
                if(furthr==0)
                solve_by_work_load(0);
                else if(furthr==1)
                solve_by_work_load(1);
                else
               solve_by_work_load(2);
            }
        }
        else//if has same
        {
            
            if(furthr==0)
                solve_by_work_load(1);
            else
               solve_by_work_load(2);
        }  
     }
     else //if further=2 ,i.e, same no. of wrks
      { 
        experience(3);
     }
       }
       catch(Exception e)
       {
           System.out.println("Here the Exception is in solve_by_wrk_load "+e);
       }
            
    }
    void experience(int flag)//flag shows the level,i.e.,flag=1(need experienced empyers to work on it)
   {
       try{
           String s;
           ResultSet rset;
           if(flag==3)
           s="select * from "+dep+" where no_of_works=(select min(no_of_works) from "+dep+") and work_completed_in_month=(select min(work_completed_in_month) from "+dep+") and no_of_works!=5";
           else if(flag==2)
           s="select * from "+dep+" where no_of_works=(select min(no_of_works) from "+dep+") and no_of_works!=5";
           else
           s="select * from "+dep+" where no_of_works!=5";    
           rset=st.executeQuery(s);        
           rset.next();
           int min=rset.getInt("joining_yr");
           int emp=rset.getInt("emp_id");
           int nwrk=rset.getInt("no_of_works");
           System.out.println("no of work is" + nwrk);
           while(rset.next())
           {
               int yr=rset.getInt("joining_yr");
              
               System.out.println("no of work are" + nwrk);
               if(min>yr)
               {
                  
                  
                   min=yr;
                   emp=rset.getInt("emp_id");  
                    nwrk=rset.getInt("no_of_works");
                   System.out.println("no of work is" + nwrk +"helo"+ emp);
                   
               }
                
           }
           System.out.println("no of work is" + nwrk);
           allot(emp,nwrk);
       }
       catch(Exception e)
       {
           System.out.println("The Exception is in experience method"+e);
       }
   }
   
   void store_in_soln(int empId)throws Exception
   {
       try
       {
       String s="insert comp_soln(comp_id,department,complain_topic) select complain_ld,department,complain_details from user where complain_ld="+comp_id+"";
       st.executeUpdate(s); 
       System.out.println("copied");
       //String ctop="jharu";
       //String q="update comp_soln set complain_topic='"+ctop+"' where comp_id='"+comp_id+"'";//###need to write among the options given in dropdown menu
       //st.executeUpdate(q);
       String p="update comp_soln set worker_id='"+empId+"' where comp_id='"+comp_id+"'";//###need to write among the options given in dropdown menu
       st.executeUpdate(p);
       }
       catch(Exception e)
            {
                System.out.println("Exception: store_in_soln method: "+e);
            }
   }
   void store_in_resp(int empId)//method for all types of department
   {
       try
       {
           if(dep.equals("dep_drain"))
           {
            String s="insert resp(name,phone,comp_id) select name,phone1,'"+comp_id+"' from dep_drain where emp_id="+empId+"";//========comp_id is not from the dep_drain table
            st.executeUpdate(s); 
           }
           else if(dep.equals("dep_electricity"))
           {
               String s="insert resp(name,phone,comp_id) select name,phone1,'"+comp_id+"' from dep_electricity where emp_id="+empId+"";//========comp_id is not from the dep_drain table
               st.executeUpdate(s);
           }
           else if(dep.equals("dep_garbage"))
           {
               String s="insert resp(name,phone,comp_id) select name,phone1,'"+comp_id+"' from dep_garbage where emp_id="+empId+"";//========comp_id is not from the dep_drain table
               st.executeUpdate(s);
           }
           else if(dep.equals("dep_mosquito"))
           {
               String s="insert resp(name,phone,comp_id) select name,phone1,'"+comp_id+"' from dep_mosquito where emp_id="+empId+"";//========comp_id is not from the dep_drain table
               st.executeUpdate(s);
           }
           else if(dep.equals("dep_water"))
           {
               String s="insert resp(name,phone,comp_id) select name,phone1,'"+comp_id+"' from dep_water where emp_id="+empId+"";//========comp_id is not from the dep_drain table
               st.executeUpdate(s);   
           }
       }
       catch(Exception e)
       {
           System.out.println("Exception: in store_in_resp method: "+e);
       }
   }
   
/*public Map<String, String> show_msg()throws Exception
{
      String handler;//####string for checking as to shw the msg to user or member of the municipality
      handler="Member";//######ri8 now just giving input for checking 
        String query="select * from resp where comp_id="+comp_id+"";
        rs= st.executeQuery(query);
        rs.next();
        String n=rs.getString("name");
        int p=rs.getInt("phone");
   
        System.out.println("*************************************************");
        System.out.println("Department: "+dep);
        System.out.println("Complain ID:"+comp_id);
        System.out.println("Worker's Name:"+n);
        System.out.println("Worker's Contact no.:"+p);
        System.out.println("*************************************************");
        HashMap<String, String> details = new HashMap<String, String>();
        details.put("Department: ",dep);
        details.put("Complain ID:",Integer.toString(comp_id));
        details.put("Worker's Name:",n);
        details.put("Worker's Contact no.:",Integer.toString(p));
        
        return details;
}
    /*int Year(int join_yr)
    {
        java.util.Date sqlDate=new java.util.Date();
        String r=sqlDate.toString();
        String yr=r.substring(r.lastIndexOf(" ")+1);
        int year=Integer.parseInt(yr);
        int diff=year-join_yr;
        return year;
    }*/
/*public void insertdata_for_compSoln() throws Exception//inserting data into depdrain
    {
     try
     {
         while(true)
         {
               int c;
               Scanner sc= new Scanner(System.in);
               System.out.println("want to continue 1 to yes,2 to no");
               c=sc.nextInt();
               if(c==1)
               {
                   String n, address, dpt,detail,name;
                   int phone1;
                   System.out.println("House no.");
                   n= sc.nextLine();
                   n= sc.nextLine();
                   System.out.println("Name");
                   name= sc.nextLine();
                   System.out.println("Mobile number");
                   phone1= sc.nextInt();
                   System.out.println("Department");
                   dpt = sc.nextLine();
                   System.out.println("address");
                   address= sc.nextLine();
                   System.out.println("Complain details");
                   detail= sc.nextLine();
                   String s="insert into user (name,phone,house_number,address,complain_details) values('"+name+"','"+phone1+"',"+n+",'"+address+"','"+detail+"')";
                  int r=st.executeUpdate(s);
               }
               else 
                   break;
         }
       }   
     catch(Exception e){
         System.out.println("error" + e);
     }
    }*/

    
}