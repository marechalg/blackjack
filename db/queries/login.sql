select id
from blackjack._user
where username = :username and password = :password
limit 1;