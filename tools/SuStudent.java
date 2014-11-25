import java.util.*;


public class SuStudent{
	public static void main(String[] args) {
		
	}
}


// Super Class 
class Student{

	private char courseGrade;
	private double total = 0;

	public String name;
	public String stdID;
	public static final int NUM_OF_TEST = 4;

	protected String faculty;

	// create constructer

	public Student(String stdID, String name, String faculty, int test){
		this.stdID 	 = stdID;
		this.name  	 = name;
		this.faculty = faculty;
		
		for(int i = 0 ; i < NUM_OF_TEST ; i++){
			this.total	+=	test[i];
		}
	}

	public char getCourseGrade(){
		return this.courseGrade;
	}

}

