set :application, "DEPISite"
set :domain,      "#{application}.com"
set :deploy_to,   "/var/www/#{domain}"
set :app_path,    "app"

set :repository,  "https://github.com/jatempa/DEPISite.git"
set :scm,         :git

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL