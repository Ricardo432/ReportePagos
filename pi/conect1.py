# -*- coding: utf-8 -*-
from __future__ import unicode_literals
from firebase import firebase
import MySQLdb
import json
class Busqueda(object):
	"""docstring for ClassName"""
	def comparacion(arg):
		db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")

		#create a cursor for the select
		a = False

		cur = db.cursor()

		#execute an sql query
		cur.execute("SELECT * FROM acceso.residentes")

		##Iterate 
		for row in cur.fetchall() :
		      #data from rows
		      #print
			if (row[0]==arg):
				if  row[1]==1:
					a=True
					break
		# close the cursor
		cur.close()

		# close the connection
		db.close ()

		return a

	def qr():
		db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")

		#create a cursor for the select
		a = False

		cur = db.cursor()

		#execute an sql query
		cur.execute("SELECT * FROM acceso.invitado")

		##Iterate 
		for row in cur.fetchall() :
		      #data from rows
		      #print
			if (row[0]==arg):
				if  row[1]==1:
					a=True
					break
		# close the cursor
		cur.close()

		# close the connection
		db.close ()

		return a
	def insertRe(tag,activo,nombre):
		db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")
		cur = db.cursor()
		cur.execute("DELETE FROM invitado where tag='"+tag+"'")
		cur.execute("INSERT INTO acceso.residente (tag,activo,nombre) values('"+tag+"','"+activo+"','"+nombre+"')")
		cur.close()
		db.close()

	def updateRe(tag,activo,nombre):
		db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")
		cur = db.cursor()
		cur.execute("UPDATE acceso.residente set activo='"+activo+"',nombre='"+nombre+"' where tag='"+tag+"'")
		cur.close()
		db.close()
	def insertIn(codigo,activo,fecha):
		db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")
		cur = db.cursor()
		cur.execute("DELETE FROM invitado where codigo='"+codigo+"'")
		cur.execute("INSERT INTO acceso.invitado (codigo,activo,fecha) values('"+codigo+"','"+activo+"','"+fecha+"')")
		cur.close()
		db.close()

	def updateIn(codigo,activo,fecha):
		db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")
		cur = db.cursor()
		cur.execute("UPDATE acceso.invitado set activo='"+activo+"',fecha='"+fecha+"' where codigo='"+codigo+"'")
		cur.close()
		db.close()


	def fire(tag):
		from firebase import firebase
		from conect import comparacion
		try:
			firebase = firebase.FirebaseApplication('https://controlacceso-2e26e.firebaseio.com/', None)
			result = firebase.get('/users', str(tag))
			result =json.dumps(result)
			#print(result)
			decoded = json.loads(result)
			#print 'DECODED:', decoded
			if decode['status'] == 1 :
				return True
			else:
				return False
		except:
			return comparacion(tag)

		
	print(fire(43456586))

def dbfire():
	from firebase import firebase
	from conect1 import Busqueda
	bus = Busqueda()
	db = MySQLdb.connect(host="localhost", user="root", passwd="250901", db="acceso")
	cur = db.cursor()
	
	firebase = firebase.FirebaseApplication('https://controlacceso-2e26e.firebaseio.com/', None)
	result = firebase.get('/total', None)
	print (result)
	result = json.dumps(result)
	decoded = json.loads(result)
	x = int(decoded['residente'])
	#for i in range(1, x):
	#	try:
	#		
	#		result2 = firebase.get('/users', str(i))
	#		result2 =json.dumps(result)
	#		decoded2 = json.loads(result)
	#		cur.execute("DELETE FROM acceso.residente where tag='"+decoded['tag']+"'")
	#		insertRe(decoded2['tag'],decoded2['status'],decoded2['nombre'])
	#	except:
	#	    pass
	x = int(decoded['invitado'])
	#for i in range(1,x):
	#	try:
	result2= firebase.get('/invitado', '1')
	print (result2)
	result2 =json.dumps(result2)
	decoded2 = json.loads(result2)
	
	bus.insertIn(decoded2['codigo'],decoded2['status'],decoded2['fecha'])
	#	except:
	#		pass
	cur.close()
	db.close()

dbfire()
