package respositorie;
import org.springframework.data.jpa.repository.JpaRepository;

import model.Phone;

public interface IPhone extends JpaRepository<Phone, Integer>{

	
}
