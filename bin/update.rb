#!/usr/bin/ruby

require 'fileutils'

ENV['PATH'] = "#{File.dirname(File.expand_path(__FILE__))}:#{ENV['PATH']}"
mediawiki_git_repo = ARGV[0] || ''

if !File.directory?(mediawiki_git_repo)
  raise ArgumentError.new('First argument must be a path to the mediawiki repo')
end

push_command = 'git subtree push --prefix=extensions/%s mediawiki-extensions %s'
FileUtils.cd(mediawiki_git_repo) do
  system('git svn rebase')

  entries = Dir.entries('extensions/')
  entries.sort! {|a,b| a.downcase <=> b.downcase}

  entries.each do |filename|
    if !File.directory?("extensions/#{filename}") || filename.match(/^\.\.?$/)
      next
    end

    system(push_command % [filename, filename])
    exit unless $?.success?
    system("rm -rf .git/subtree-cache/#{$?.pid}")
  end

  system('git gc --aggressive')
end

FileUtils.cd("#{File.dirname(__FILE__)}/..") do
  system('git fetch')
  system('git gc --aggressive')
end

