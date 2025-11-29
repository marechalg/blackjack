create or replace trigger tg_create_user
before insert on blackjack._user
for each row
when (new.display_name is null)
execute function set_display_name();