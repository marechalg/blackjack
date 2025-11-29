select exists (
    select 1
    from blackjack._user
    where id = :id
    limit 1
);