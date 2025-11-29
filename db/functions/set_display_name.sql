create or replace function set_display_name()
returns trigger as $$
begin
    new.display_name := new.username;
    return new;
end;
$$ language plpgsql;