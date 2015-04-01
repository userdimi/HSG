<?php
/*
*Der Name des Models spiegelt den Pfad zum der Modeldatei wieder.
*In diesem Fall liegt das Model in hsg/model/Article.php 
*Ein Model spiegelt die Datenbanktabelle mit ihren Datenfeldern wieder
*Das Model ist dafür zuständig werte zu setzen, da das Model
*für die Beschafung der Daten verantwortlich ist. 
*
*Dies ist ein recht simples Model besteht fast nur aus setter und getter
*Alle Attribute sind protected, das heißt das wir diese NUR in dieser klasse
*setzten können. In den setter methoden wird jeweils an Parameter übergeben.
*Woran du eine setter methode erkennst brauch ich nicht sagen ^^. 
*die getter methoden erlauben die Attribute auserhalb der Klasse zu benutzen. 
* 
*/
class Hsg_Model_Article
{
	//Hier werden die ganzen Attribute definiert, aber das ist klar.
	protected $_id 	     = null; 
	protected $_date 	 = null; 
	protected $_status 	 = null; 
	protected $_user     = null; 
	protected $_category = null; 
	protected $_title    = null; 
	protected $_teaser   = null; 
	protected $_text 	 = null; 
	protected $_url 	 = null; 
	protected $_count    = null; 


	public function setId($id)
	{
		$id = (int) $id; //explizit in Int umwandel
		
		if($id != 0)
		{
			//Das $this ist eine refernez auf eigene Objekte. in diesem
			//Fall auf das Attribut $_id, hier wird als der Wert der $_id
			//auf den Wert des Parameters $id gesetzt 
			$this->_id = $id;
		}
	}

	public function getId()
	{
		//Wollen wir ein Attribut dieser Klasse auserhalb dieser ansprechen
		//so benutzen wir diese Methode. Aber ist idR. nicht nötig, um mehr zu 
		//Erfahren scroll zum schluss.

		/*
		*Kurze Info zum return, auch wenn du es wohl schon weißt.
		*Stolpert der interpreter über ein Return, so wird alles ander nicht mehr
		*ausgeführt, es hat einen ähnlichen effekt wie die(), nur das die() die komplette 
		*scriptausführung unterbricht während das return für eine Funktion das ende symbolisiert.
		*/ 
		return $this->_id;
	}

	public function setDate($date)
	{
		$this->_date = $date;
	}

	public function getDate()
	{
		return $this->_date;
	}

	public function setStatus($status)
	{
		if(!in_array($status, array("new","approved","blocked")))
		{
			return false;
		}

		$this->_status = $status;
	}

	public function getStatus()
	{
		return $this->_status;
	}

	//Das Besondere an dieser Funktion ist, naja ist eigentlich
	//nix besonderes, aber hier wird als Parameter das objekt 
	//User_Model_User erwartet, hier sind alle Daten drinn
	//Die einen User betreffen. 
	public function setUser(User_Model_User $user)
	{
		$this->_user = $user;
	}

	public function getUser()
	{
		return $this->_user;
	}

	//Rate mal was hier drinn ist?^^
	public function setCategory(Hsg_Model_Category $category)
	{
		$this->_category = $category;
	}

	public function getCategory()
	{
		return $this->_category;
	}

	public function setTitle($title)
	{
		if(is_string($title))
		{
			$this->_title = $title;
		}
	}

	public function getTitle()	
	{
		return $this->_title;
	}

	public function setTeaser($teaser)
	{
		if(is_string($teaser))
		{
			$this->_teaser = $teaser;
		}
	}

	public function getTeaser()
	{
		return $this->_teaser;
	}

	public function setText($text)
	{
		if(is_string($text))
		{
			$this->_text = $text;
		}
	}

	public function getText()
	{
		return $this->_text;
	}

	public function setUrl($url)
	{
		if(is_string($url))
		{
			$this->_url = $url;
		}
	}

	public function getUrl()
	{
		return $this->_url;
	}

	public function setCount($count)
	{
		$count = (int) $count;

		if($count != 0)
		{
			$this->_count;
		}
	}

	public function getCount()
	{
		return $this->_count;
	}

	//Diese Funktion fast alle Werte in einem Array zusammen. 
	//Und werden idR. über das Array angesprochen, daher werden 
	//einzelnen getter eher selten aufgerufen, weil alles was man
	//man brauchen könnte, wir ja hier haben.  
	public function toArray()
	{
		$data = array(
				"article_id"       => $this->getId(),
				"article_date"     => $this->getDate(),
				"article_status"   => $this->getStatus(),
				"article_user"     => $this->getUser()->toArray(), //Die Methode toArray(), stammt aus dem Model User_Model_User, weil wir hier ja das Objekt davon haben.
				"article_category" => $this->getCategory()->toArray(),
				"article_title"    => $this->getTitle(),
				"article_teaser"   => $this->getTeaser(),
				"article_text"     => $this->getText(),
				"article_url"      => $this->getUrl(),
				"article_count"    => $this->count()
			);

		return $data;
	}
}
