
## Challange 
Create a console command that generates a ticket with dummy data every minute. A
ticket should have the following fields:

#### ○ Ticket Subject
#### ○ Ticket Content
#### ○ Name of the user who submitted the ticket
#### ○ Email of the user who submitted the ticket
#### ○ Time when the ticket was added
#### ○ Status of the ticket (boolean) - Set to false by default to indicate that the ticket is
not processed.

#### ● Create another console command that processes a ticket 5 every five minutes. Tickets
should be processed in chronological order. Changing the status value to true would be
considered as processing of the ticket.
#### ● Create API endpoints that can provide the following functionality:
#### ○ Return a paginated list of all unprocessed tickets (i.e. all tickets with status set to
false)
#### ○ Return a paginated list of all processed tickets (i.e. all tickets with status set to
true)

#### ○ Return a paginated list of all tickets that belong to the user with the
corresponding email address.
#### ○ Return the following stats:
#### ■ total number of tickets in the database;
#### ■ total number of unprocessed tickets in the database;
#### ■ name of the user who submitted the highest number of tickets (count by
email); and
#### ■ time when the last processing of a ticket was done.




## To run it

1. make sure you have database connection correctly
2. migrate db by using `php artisan migrate `
3. to run scheduler locally `php artisan schedule:work`
4. Api enpoints:
   1. api/tickets/all
   2. api/tickets/processed
   3. api/tickets/unprocessed 
   4. api/tickets/stats




