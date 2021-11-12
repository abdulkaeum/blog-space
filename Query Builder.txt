??????
Subqueries
addSelect

##########################
DB Binded Queries
DB::select('select * form users where status = :status and x = :x', ['status' => 'active', 'x' => 'x']);
DB::update('update users set status = :status where status = :status, ['status' => 'c', 'status' => 'a']);
DB::insert('insert into users (name, email) values (:name, :email)', ['name' => 'abdul', 'email' => 'myemail']);
DB::delete('delete from users where id = :id', ['id' => 1]);


##########################
Debugging
DB::listen(closure)
DB::table()->dd() // no get()

#########################
Database transactions
DB::transaction(anonymous closure)

#########################
Retrieve results 
DB::table('users')->get();
DB::table('users')->where('email', 'value')->first();
DB::table('users')->where('email', 'value')->value('email');
DB::table('users')->find(1);
DB::table('users')->pluck('email');

########################
Aggregates
DB::table('users')->count();
DB::table('orders')->avg('price');
DB::table('users')->max('views');
DB::table('users')->min('views');
DB::table('users')->where('email', 'ak@ak.com')->exists();


#######################
Select
DB::table('users')->select('name', 'email as em')->get();
DB::table('users')->distinct()->get();

######################
Where 
where(x)->groupBy(x)->get();

->where(
	['age', '>', '39'],
	['gendar', '=', 'M']
)->get()

->where()->where()->get(); AND

->where()->orWhere()->get(); OR

->orWhere(function($q){
	$q->where('name', '=', 'x')
	->where('price', '>', '0')
}) // or (name = x and price > 0)


select * from users where votes > 100 or (name = 'Abigail' and votes > 50)
DB::table(users)->where('votes', '>', 100)->orWhere(function($q){
	$q->where('name', 'Abigail')
	->where('votes', '>', 50)
})

->whereBetween('votes', [1, 100])
->whereIn('id', [1,2,3])
->whereNull('created_at')

->whereDate('created_at', '>', '2021-01-21')
->whereTime('created_at', '>', '11:20:20')
->whereDay('21')
->whereMonth('01')
->whereYear('2021')

whereColumn('user.id', 'posts.user_id')

->whereExists(function($q) {
	$q->select('price')
		->from('orders')
		->where('price', '>', '2.00')
		->whereColumn('users.id', 'orders.user_id')
})

###########################
JSON
->where('json->meal->dinner', 'salad')
->whereJsonContains(json->meal->dinner', ['salad', 'p'])

##########################
Ordering
->orderBy('name', 'asc')
	->orderBy('created_at', 'desc')->get()
->latest()->first()
->oldest()->get()
->inRandomOrder()->first()
->reorder()->get() // REMOVE ALL ORDERS
->reorder('name', 'asc')->get() // REMOVE ALL ORDERS APPLY NEW ORDER

->groupBy('acc_type')->get()
->groupBy('acc_type', 'another_col')->get()

->limit(1) ->take(1)->get()
->offset(1) ->skip(1)->get()

###########################
Conditional Clauses
->when($request->input('votes'), function($q, $input){
	return $q->where('votes', $input)
}), functon ($q) {
	return $q->where('votes', 'x')
}

##########################
Insert
DB::table('users')->insert(
	['name' => 'ak', 'email' => 'ak'],
	['name' => 'ab', 'email' => 'ab']
)

#########################
Update
->where('id', 1)->update(['email' => 'em@em'])

->updateOrInsert(
	['name' => 'ak', 'email' => 'ak'], // find this or insert the whole thing
	['votes' => 'x']
)

->increment('votes')
->decrement('votes', 5)

######################
Delete
->delete()
->truncate()

#####################
Large data sets
chunk()
lazy()

####################
Joins
DB::table('users')
	->join('contacts', 'users.id', '=', 'contacts.user_id')
	->join('orders', 'users.id', '=', 'orders.user_id')
	->get();

->leftJoin()
->rightJoin()

