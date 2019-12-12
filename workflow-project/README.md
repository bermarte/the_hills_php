# workflow-project
working together with Symfony
# to copy the repository:
git clone git@github.com:bermarte/workflow-project.git<br>
# start your project:
cd workflow-project<br>
composer install<br>
# configure your db:
cp .env .env.local<br>
edit this line in .env.local : DATABASE_URL=mysql://user:password127.0.0.1:3306/db_schema<br>
create a new db_schema using datagrip or<br>
php bin/console doctrine:database:create<br>
php bin/console make:migration<br>
php bin/console doctrine:migrations:migrate<br>
<hr>


#Mission call center:

#Guest:

- Hij kan zichzelf registreren als klant.

- Hij kan inloggen om een hogere rol te krijgen ( customer, agent ).

- En zorg ervoor dat je een "wachtwoord vergeten" knop hebt die ook funcioneerd.


----------------------------------------------------------------------------------------

Customer:												 
TICKET:



- Een klant kan een ticket maken op de website. En krijgt de status "OPEN".				-Ticket heeft een ID 

-Tekst_body (information in the ticket)

-Ticket heeft een foreign key (id customer)

-Is_public and Is_private

-Status is open or closed

-Property Is_in_progress

-Customer_comment and Agent_comment
				
-Ticket is_waiting_for_customer_feedback, yes or not

-Escalate yes or not
	


															
- De klant kan al zijn open tickets zien die hij heeft gemaakt op de website en hij kan
  erop reageren ( commenten ).

- Als de klant reageert op een ticket met de status "Wachten op feedback van de klant",
  mail dan de agent en verander de status opnieuw in "in uitvoering".

- Een klant kan een ticket opnieuw openen als het korter dan 1 uur is gesloten.


----------------------------------------------------------------------------------------

Agent:


-Agent heeft een ID (property)

-Escalate a ticket (property)

-Name (property)

-Password (property)

-Leave comment on ticket (function)

-Choose comment to be public or private	(property)

-Agent kan de ticket zien (function)

-Agent can auto-assign a ticket	(function)

- Nummer 1 agenten kunnen alle open tickets zien en er een aan zichzelf toewijzen. Het krijgt nu de status "in uitvoering".

- Agenten kunnen opmerkingen achterlaten op een ticket dat openbaar kan zijn (de klant
  kan de opmerking zien en reageren) of privé (onzichtbaar voor klant).

- Als de agent een openbare opmerking achterlaat, markeert u het ticket "Wachten op feedback van klanten".

- Nummer 1 agenten kunnen "een ticket escaleren" naar "tweedelijns" hulp.


----------------------------------------------------------------------------------------

Second-line Agent:

	

-Secondline-Agent heeft een ID (property)

-Name (property)

-Password (property)

-Leave comment on ticket (function)

-Choose comment to be public or private (property)

													


- Tweedelijnsagenten kunnen alles doen wat een eerstelijnsagent kan, maar alleen voor
  geëscaleerde tickets.


----------------------------------------------------------------------------------------

Managers:


			
Manager:

-Manager heeft een ID

-Name

-Password

-Manager kan een agent maken (function)

-Manager can see the number of open, closed and re-opened tickets of the 														 agents ( function)

-Manager kan de percentage zien (function)

-Manager can re-assign tickets (function)

-Manager can mark the ticket "won't fix", should write why

-Manager can with 1 button de-assign all the tickets for the agents 														(function)

-Manager can assign priorities (function)



- Een manager kan nieuwe agenten maken of de details van een agent wijzigen (eerste- of
  tweedelijnshulp). 
  
  Wanneer een nieuwe agent wordt aangemaakt, stuurt hij een
  welkomstmail naar de agent, met een link waar de agent zijn wachtwoord kan
  configureren. 
  
  Je kunt de logica van de gaststroom "wachtwoord vergeten" hier opnieuw gebruiken.


- Zorg voor een dashboard waar managers statistieken over de agenten kunnen zien:

     -Aantal open tickets
     -Aantal gesloten tickets
     -Aantal tickets dat opnieuw is geopend
     -Een procentuele vergelijking tussen de 2 bovenstaande cijfers.


- Een manager kan tickets opnieuw toewijzen of markeren als "lost niet op".
  

  In het laatste geval wordt het ticket als gesloten beschouwd en kan het niet later door de klant worden geopend. 
  U moet een verplicht veld opgeven om een reden voor de manager in te voeren waarom hij dit niet zal oplossen.


- Managers kunnen met één knop alle tickets de-toewijzen, ze krijgen opnieuw de status "open". 

  Normaal doen ze dit aan het einde van elke werkdag om te voorkomen dat tickets worden vergrendeld door een agent die de volgende dag ziek is.


- Managers kunnen prioriteiten toewijzen, waarop de tickets moeten worden gesorteerd.




