require 'sinatra'

get '/' do
    erb :first
end

post '/after' do
    fname=params[:fname]
    lname=params[:lname]

    rev_fname=fname.reverse.capitalize
    rev_lname=lname.reverse.capitalize

    @reversed_names = {
        fname: rev_fname,
        lname: rev_lname
    }
erb :after
end
