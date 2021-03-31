<?php 
	class Job{
		private $db;

		public function __construct(){
			$this->db = new Database;
		}
		

		public function auth($data){
			$this->db->query("SELECT count(*) as c FROM user_login_details WHERE email = :email");

			$this->db->bind(':email',$data['email']);
			// $this->db->bind(':password',$data['password']);
			$res = $this->db->single();

			if($res->c)
			{
				return false;
			}
			else{
				return true;

			}
			


		}

		public function enter_user_creds($data){
			

			$this->db->query("INSERT INTO user_login_details (email, password) VALUES (:email, :password)");

			$this->db->bind(':email',$data['email']);
			$this->db->bind(':password',$data['password']);


			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}
		

		}

		public function auth2($data){
			$this->db->query("SELECT count(*) as c FROM user_login_details WHERE email = :email and password = :password");

			$this->db->bind(':email',$data['email']);
			$this->db->bind(':password',$data['password']);
			$res = $this->db->single();

			if($res->c == 1)
			{
				return 1;
			}
			else
			{
				$this->db->query("SELECT count(*) as c FROM user_login_details WHERE email = :email");
				$this->db->bind(':email',$data['email']);
				$res = $this->db->single();
				if($res->c == 1)
				{
					return 2;
				}
				else {
					return 3;

				}

				

			}
		}

		public function enter_cert_details($data){
			

			$this->db->query("INSERT INTO certification_details (employee_name, email, csp, certification_level, certification_name, certification_id, date_of_certification, expiry_date, validity, user_email, emp_no, certificate_link) VALUES (:employee_name, :email, :csp, :certification_level, :certification_name, :certification_id, :date_of_certification, :expiry_date, :validity, :user_email, :emp_no,:certificate_link)");

			$this->db->bind(':employee_name',$data['employee_name']);
			$this->db->bind(':email',$data['email']);
			$this->db->bind(':csp',$data['csp']);
			$this->db->bind(':certification_level',$data['certification_level']);
			$this->db->bind(':certification_name',$data['certification_name']);
			$this->db->bind(':certification_id',$data['certification_id']);
			$this->db->bind(':date_of_certification',$data['date_of_certification']);
			$this->db->bind(':expiry_date',$data['expiry_date']);
			$this->db->bind(':validity',$data['validity']);
			$this->db->bind(':user_email',$data['user_email']);
			$this->db->bind(':emp_no',$data['emp_no']);
			$this->db->bind(':certificate_link',$data['certificate_link']);


			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}
		

		}

		public function get_csps(){
			$this->db->query("SELECT * FROM csp");

			// $this->db->bind(':email',$data['email']);
			// $this->db->bind(':password',$data['password']);
			$res = $this->db->resultSet();

			return $res;
			


		}

		public function getCsp_names(){
			$this->db->query("SELECT * FROM certification_names");
			// $this->db->bind(':csp_id',$data['csp_id']);

			
			$res = $this->db->resultSet();

			return $res;
			


		}

		public function getCertDetails($emp_no,$email){
			$this->db->query("SELECT * FROM certification_details WHERE emp_no = :emp_no and user_email = :user_email");

			$this->db->bind(':emp_no',$emp_no);
			$this->db->bind(':user_email',$email);


			
			$res = $this->db->resultSet();

			return $res;
			


		}

		public function authenticate_certification($data){
			$this->db->query("SELECT count(*) as c FROM certification_details WHERE certification_name = :certification_name and emp_no = :emp_no");

			$this->db->bind(':certification_name',$data['certification_name']);
			$this->db->bind(':emp_no',$data['emp_no']);
			$res = $this->db->single();

			if($res->c)
			{
				return true;
			}
			else{
				return false;

			}
			


		}

		public function getDetails($data){
			$this->db->query("SELECT * FROM certification_details WHERE certification_name = :certification_name and emp_no = :emp_no and user_email = :user_email");

			$this->db->bind(':certification_name',$data['certification_name']);
			$this->db->bind(':emp_no',$data['emp_no']);
			$this->db->bind(':user_email',$data['user_email']);
			
			$res = $this->db->resultSet();

			return $res;
			


		}

		public function getCertLink($data){
			$this->db->query("SELECT certificate_link FROM certification_details WHERE certification_name = :certification_name and emp_no = :emp_no and user_email = :user_email");

			$this->db->bind(':certification_name',$data['certification_name']);
			$this->db->bind(':emp_no',$data['emp_no']);
			$this->db->bind(':user_email',$data['user_email']);
			
			$res = $this->db->single();

			return $res->certificate_link;
			


		}

		public function update_cert_details($data){
			

			$this->db->query("UPDATE certification_details SET employee_name = :employee_name, email=:email, csp = :csp, certification_level = :certification_level, certification_id = :certification_id, date_of_certification = :date_of_certification, expiry_date = :expiry_date, validity = :validity, user_email = :user_email, certificate_link= :certificate_link WHERE emp_no = :emp_no AND  certification_name = :certification_name");

			$this->db->bind(':employee_name',$data['employee_name']);
			$this->db->bind(':email',$data['email']);
			$this->db->bind(':csp',$data['csp']);
			$this->db->bind(':certification_level',$data['certification_level']);
			$this->db->bind(':certification_name',$data['certification_name']);
			$this->db->bind(':certification_id',$data['certification_id']);
			$this->db->bind(':date_of_certification',$data['date_of_certification']);
			$this->db->bind(':expiry_date',$data['expiry_date']);
			$this->db->bind(':validity',$data['validity']);
			$this->db->bind(':user_email',$data['user_email']);
			$this->db->bind(':emp_no',$data['emp_no']);
			$this->db->bind(':certificate_link',$data['certificate_link']);


			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}
		

		}
		public function authAdmin($data){
			$this->db->query("SELECT admin FROM user_login_details WHERE email = :email and password = :password");

			$this->db->bind(':email',$data['email']);
			$this->db->bind(':password',$data['password']);

			$res = $this->db->single();

			if($res->admin == 1)
			{
				return true;
			}
			else
			{
				return false;			

			}
		}

		public function getAllUsers(){
			$this->db->query("SELECT * FROM user_login_details WHERE admin = 0");
			// $this->db->bind(':csp_id',$data['csp_id']);

			
			$res = $this->db->resultSet();

			return $res;
			


		}

		public function deleteUser($id){
			$this->db->query("DELETE FROM user_login_details WHERE id = :id");
			$this->db->bind(':id',$id);

			
			if($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;

			}

			
			


		}

		public function importQuestions($data){
			

			$this->db->query("INSERT INTO questions(Question,A,B,C,D,Answer,Description,Csp,Topic) VALUES(:Question,:A,:B,:C,:D,:Answer,:Description,:Csp,:Topic)");

			$this->db->bind(':Question',$data['Question']);
			$this->db->bind(':A',$data['A']);
			$this->db->bind(':B',$data['B']);
			$this->db->bind(':C',$data['C']);
			$this->db->bind(':D',$data['D']);
			$this->db->bind(':Answer',$data['Answer']);
			$this->db->bind(':Description',$data['Description']);
			$this->db->bind(':Csp',$data['Csp']);
			$this->db->bind(':Topic',$data['Topic']);
			


			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}
		

		}

		public function deleteQuestions($qn_id,$delType){
			if($delType == 'All')
			{
				$this->db->query("TRUNCATE oqs.questions");
				if($this->db->execute())
				{
					return true;
				}
				else
				{
					return false;

				}
			}
			else
			{
				$this->db->query("DELETE FROM questions WHERE id = :id");
				$this->db->bind(':id',$qn_id);

				
				if($this->db->execute())
				{
					return true;
				}
				else
				{
					return false;

				}

			}
			
			


		}

		public function getAllQuestions(){
			$this->db->query("SELECT * FROM questions");
			
			
			$res = $this->db->resultSet();

			return $res;

			
			


		}

		public function getUsersScores(){
			$this->db->query("SELECT * FROM leaderboard ORDER BY score DESC ");
			
			
			$res = $this->db->resultSet();

			return $res;

			
			


		}
		public function enterScore($data){
			$this->db->query("INSERT INTO leaderboard(test_name,score,user_email) VALUES(:test_name,:score,:user_email)");
			
			$this->db->bind(':test_name',$data['test_name']);
			$this->db->bind(':score',$data['score']);
			$this->db->bind(':user_email',$data['user_email']);

			if($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;

			}

			
			


		}

		public function updateScore($data){
			$this->db->query("UPDATE leaderboard SET score = :score WHERE user_email = :user_email AND test_name = :user_email");
			
			$this->db->bind(':test_name',$data['test_name']);
			$this->db->bind(':score',$data['score']);
			$this->db->bind(':user_email',$data['user_email']);

			if($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;

			}

			
			


		}

		public function enterIntoHistory($data){
			$this->db->query("INSERT INTO history(test_name,score,user_email) VALUES(:test_name,:score,:user_email)");
			
			$this->db->bind(':test_name',$data['test_name']);
			$this->db->bind(':score',$data['score']);
			$this->db->bind(':user_email',$data['user_email']);

			if($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;

			}

			
			


		}

		public function findScore($data){
			$this->db->query("SELECT score AS sc FROM leaderboard WHERE user_email = :user_email and test_name = :test_name");

			$this->db->bind(':user_email',$data['user_email']);
			$this->db->bind(':test_name',$data['test_name']);

			$res = $this->db->single();

			if(isset($res->sc) && $res->sc != NULL)
			{
				return $res->sc;
			}
			else
			{
				return -1;			

			}
		}
		public function getHistory($user_email){
			$this->db->query("SELECT * FROM history WHERE user_email = :user_email ORDER BY date_and_time DESC ");
			
			$this->db->bind(':user_email',$user_email);
			$res = $this->db->resultSet();

			return $res;

			
			


		}

		

	}