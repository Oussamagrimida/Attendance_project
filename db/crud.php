<?php
class crud{
        // private database object\
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        
        // function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email,$contact,$speciality){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO attendance (firstname,lastname,dateofbirth,email,contactnumber,speciality_id) VALUES (:fname,:lname,:dob,:email,:contact,:speciality)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
 
        }
        
        public function getAttendees(){
            $sql = "SELECT * FROM attendance a inner join specialities s on a.speciality_id=s.speciality_id ";
            $result = $this->db->query($sql);
            return $result;
        }
        public function getSpeciality(){
            $sql = "SELECT * FROM specialities ";
            $result = $this->db->query($sql);
            return $result;
        }

        public function editAttendees($id,$fname, $lname, $dob, $email,$contact,$speciality){
            try {
                // define sql statement to be executed
                $sql = "UPDATE `attendance` SET `attendee_id`=:id,`firstname`=:fname,`lastname`=:lname,
                `dateofbirth`=:dob,`email`=:email,`contactnumber`=:contact,`speciality_id`=:speciality WHERE attendee_id=:id";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':speciality',$speciality);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
 
        }
        
        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM `attendance` WHERE attendee_id=:id ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            } 
        }
       
        public function getAttendeesByid($id){
            $sql = "SELECT * FROM attendance a inner join specialities s on a.speciality_id=s.speciality_id
            where attendee_id = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }   
    }   
?>

