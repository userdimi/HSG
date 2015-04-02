<?php
/*
*Hier bissle OOP - Basics
*Wie unsere Klasse heist ist selbsterklärend, aber was ist dieses extends?
*Genau, damit sagen wir dieser Klasse, das diese von einer Klasse erben soll
*in diesem Fall ist es die Zend_View_blabla, das grüne halt.
*Erben bedeute das diese Klasse, alle Methoden und Attribute der Klasse
*verwenden kann, von der er es erbt. 
*/
class Hsg_View_Helper_ShowArticle extends Zend_View_Helper_Abstract
{

	/*
	*In PHP und vielen anderen Programmiersprachen ist es möglich 
	*einem Parameter einen Standartwert zu geben, das heißt, wenn bei 
	*der nutzung dieser Funktionen für den letzten Parameter, kein Wert gestezt wurde
	*so nimmt er das, was hier definiert wurde, nämlich true. Man 
	*ist hier auf Booltypen beschränkt, man kann hier alles mögliche 
	*angeben solange es keinen FATAL ERROR auslöst ^^
	*Bei JavaScript ist es nur mit einem kleinen aufwand möglich so weit ich weiß. 
	*
	*Diese Funktion erwartet eine Objet des Article Models, der zweite 
	*parameter ist optional und muss nicht angebeben werden wenn diese 
	*funktion ausführt. Solche parameter sollte man nach hinter der Para.
	*liste verschwieben.
	*/
	function showArticle(Hsg_Model_Article $article, $showTeaser = true)
	{
		
		$output = '<h2><a href="'.$this->view->url(array(
				'module'=>'hsg','controller'=>'index',
				'action'=>'show', 'id'=>$article->getId())).'">'
				.$article->getTitle() . "</a></h2>";

		
		//Der Punkt hier vor dem Gleichheitszeichen erweitert die variabel $output
		//Die wird oben definiert, aus JavaScript kennst du das wahrscheinlich als + 
		$output .= '<p><em>';
		$output .= 'Geschrieben von <a href="'.$this->view->url(array('module'=>'hsg', 'controller'=>'index',
												'action'=>'user', 'id'=>$article->getUser()->getId())
												).'">' . $article->getUser()->getName() . "</a> ";
		
		/*
		* Ich versuch mal kurz dieses Konstrkut zu erklären $article->getUser()->getName()
		* Also oben haben in den Parameter haben wir ja gesagt das wir ein Objekt der Klasse
		* Hsg_Model_Article erwarten und in der Klasse haben wir eine Funktion in der das Objekt
		* der Klasse User_Model_User erwarten. Also die Variable ist ein Objekt der klasse 
		* Hsg_Model_Article. Als erstes haben wir hier $article, das ist sozusagen der Boss
		* und steht am anfang. Mit dem pfeil -> auf welche Methode der zugreifen soll, hab wir in der Methode 
		* eine andere Methode drinn, weil wir die via parameter übergeben, so können wir 
		* diese mit dem pfeil auch aufrufen.
		* also:
		* 1. Hsg_Model_Article wird über $article angesprochen
		* 2. Wir greifen auf die Methode getUser() zu.
		* 3. Aus der getUser() heraus auf getName aufrufen().
		* 
		* ich hoffe es ist halb verständlich.  
		* Bei Fragen kurz fragen.
		*/

		$output.= 'am ' . $this->view->date($article->getDate()) . ' ';
        $output.= 'um ' . $this->view->time($article->getDate()) . ' Uhr ';
        $output.= 'in Kategorie "<a href="' . $this->view->url(array(
                'module' => 'hsg', 'controller' => 'index', 
                'action' => 'category', 'id' => $article->getCategory()->getId())
        ) . '">' . $article->getCategory()->getName() . '</a>"';
        $output.= '</em></p>';
        $output.= $showTeaser ? $article->getTeaser() : $article->getText();
        
        return $output;
	}
	
}